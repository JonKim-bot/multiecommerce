<?php

namespace App\Libraries;

use App\ThirdParty\fpdf\fpdf;

class PDF extends fpdf
{
    public function __construct()
    {
        parent::__construct();  
    }

    private $Big5_widths = array(' '=>250,'!'=>250,'"'=>408,'#'=>668,'$'=>490,'%'=>875,'&'=>698,'\''=>250,
        '('=>240,')'=>240,'*'=>417,'+'=>667,','=>250,'-'=>313,'.'=>250,'/'=>520,'0'=>500,'1'=>500,
        '2'=>500,'3'=>500,'4'=>500,'5'=>500,'6'=>500,'7'=>500,'8'=>500,'9'=>500,':'=>250,';'=>250,
        '<'=>667,'='=>667,'>'=>667,'?'=>396,'@'=>921,'A'=>677,'B'=>615,'C'=>719,'D'=>760,'E'=>625,
        'F'=>552,'G'=>771,'H'=>802,'I'=>354,'J'=>354,'K'=>781,'L'=>604,'M'=>927,'N'=>750,'O'=>823,
        'P'=>563,'Q'=>823,'R'=>729,'S'=>542,'T'=>698,'U'=>771,'V'=>729,'W'=>948,'X'=>771,'Y'=>677,
        'Z'=>635,'['=>344,'\\'=>520,']'=>344,'^'=>469,'_'=>500,'`'=>250,'a'=>469,'b'=>521,'c'=>427,
        'd'=>521,'e'=>438,'f'=>271,'g'=>469,'h'=>531,'i'=>250,'j'=>250,'k'=>458,'l'=>240,'m'=>802,
        'n'=>531,'o'=>500,'p'=>521,'q'=>521,'r'=>365,'s'=>333,'t'=>292,'u'=>521,'v'=>458,'w'=>677,
        'x'=>479,'y'=>458,'z'=>427,'{'=>480,'|'=>496,'}'=>480,'~'=>667);

    private $GB_widths = array(' '=>207,'!'=>270,'"'=>342,'#'=>467,'$'=>462,'%'=>797,'&'=>710,'\''=>239,
        '('=>374,')'=>374,'*'=>423,'+'=>605,','=>238,'-'=>375,'.'=>238,'/'=>334,'0'=>462,'1'=>462,
        '2'=>462,'3'=>462,'4'=>462,'5'=>462,'6'=>462,'7'=>462,'8'=>462,'9'=>462,':'=>238,';'=>238,
        '<'=>605,'='=>605,'>'=>605,'?'=>344,'@'=>748,'A'=>684,'B'=>560,'C'=>695,'D'=>739,'E'=>563,
        'F'=>511,'G'=>729,'H'=>793,'I'=>318,'J'=>312,'K'=>666,'L'=>526,'M'=>896,'N'=>758,'O'=>772,
        'P'=>544,'Q'=>772,'R'=>628,'S'=>465,'T'=>607,'U'=>753,'V'=>711,'W'=>972,'X'=>647,'Y'=>620,
        'Z'=>607,'['=>374,'\\'=>333,']'=>374,'^'=>606,'_'=>500,'`'=>239,'a'=>417,'b'=>503,'c'=>427,
        'd'=>529,'e'=>415,'f'=>264,'g'=>444,'h'=>518,'i'=>241,'j'=>230,'k'=>495,'l'=>228,'m'=>793,
        'n'=>527,'o'=>524,'p'=>524,'q'=>504,'r'=>338,'s'=>336,'t'=>277,'u'=>517,'v'=>450,'w'=>652,
        'x'=>466,'y'=>452,'z'=>407,'{'=>370,'|'=>258,'}'=>370,'~'=>605);


    protected $B = 0;
    protected $I = 0;
    protected $U = 0;
    protected $HREF = '';

    function WriteHTML($html)
    {
        // HTML parser
        $html = str_replace("\n",' ',$html);
        $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
        foreach($a as $i=>$e)
        {
            if($i%2==0)
            {
                // Text
                if($this->HREF)
                    $this->PutLink($this->HREF,$e);
                else
                    $this->Write(5,$e);
            }
            else
            {
                // Tag
                if($e[0]=='/')
                    $this->CloseTag(strtoupper(substr($e,1)));
                else
                {
                    // Extract attributes
                    $a2 = explode(' ',$e);
                    $tag = strtoupper(array_shift($a2));
                    $attr = array();
                    foreach($a2 as $v)
                    {
                        if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                            $attr[strtoupper($a3[1])] = $a3[2];
                    }
                    $this->OpenTag($tag,$attr);
                }
            }
        }
    }

    function OpenTag($tag, $attr)
    {
        // Opening tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,true);
        if($tag=='A')
            $this->HREF = $attr['HREF'];
        if($tag=='BR')
            $this->Ln(5);
    }

    function CloseTag($tag)
    {
        // Closing tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,false);
        if($tag=='A')
            $this->HREF = '';
    }

    function SetStyle($tag, $enable)
    {
        // Modify style and select corresponding font
        $this->$tag += ($enable ? 1 : -1);
        $style = '';
        foreach(array('B', 'I', 'U') as $s)
        {
            if($this->$s>0)
                $style .= $s;
        }
        $this->SetFont('',$style);
    }

    function PutLink($URL, $txt)
    {
        // Put a hyperlink
        $this->SetTextColor(0,0,255);
        $this->SetStyle('U',true);
        $this->Write(5,$txt,$URL);
        $this->SetStyle('U',false);
        $this->SetTextColor(0);
    }

    function Header(){
        $this->Ln(10);
    }

    function Footer(){

        $this->Ln(10);
        // $this->SetY(-15);
        // $this->SetFont('Arial','I',8);
        // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    function PrintHeader($student){

        // die(var_dump($student));
        // $this->AddFont('VANAVILAvvaiyar','','vanavil Avvaiyar.php');
        $this->AddFont('TSCu_SaiIndira','','TSCu_SaiIndira.php');
        $this->AddFont('msyh','','msyh.php');
        // $this->AddFont('simhei','','simhei.php');
        $this->AddGBFont('simhei', 'simhei');
        $this->AddBig5Font();
        $this->AddPage();

        // $this->SetFont('simhei','',20);
        // $this->Write(10, '随机这样子机器');
        // $this->Write(10, iconv('UTF-8', 'GBK//TRANSLIT', '随机这样子机器asdasd%%%@#'));

        // $this->SetFont('msyh','',20);
        // $this->Write(10, '随机这样子机器');
        // $this->Write(10, iconv('UTF-8', 'GBK//TRANSLIT', '随机这样子机器asdasd%%%@#'));

        // $this->SetFont('Big5','',20);
        // $this->Write(10, '随机这样子机器');
        // $this->Write(10, iconv('UTF-8', 'GBK//TRANSLIT', '随机这样子机器asdasd%%%@#'));

        $this->Ln(25);

        $this->SetFont('Times');
        $this->Cell(10, 10, 'Name:');
        $this->Cell(5);
        $this->Cell(10, 10, $student["name"]);
        $this->Cell(60);
        $this->Cell(10, 10, 'NRIC:');
        $this->Cell(5);
        $this->Cell(10, 10, '');
        $this->Cell(50);
        $this->Cell(10, 10, 'Class:');
        $this->Cell(5);
        $this->Cell(10, 10, $student['classroom']);
        $this->Ln(15);
    }

    var $widths;
    var $aligns;

    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths=$w;
    }

    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns=$a;
    }

    function TamilRow($data)
    {
        $this->SetFont('TSCu_SaiIndira');
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++){
            $tamilstr = iconv('UTF-8', 'TSCII//TRANSLIT', $data[$i]);
            $nb=max($nb,$this->NbLines($this->widths[$i],$tamilstr));
        }
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->Rect($x,$y,$w,$h);
            //Print the text
            $tamilstr = iconv('UTF-8', 'TSCII//TRANSLIT', $data[$i]);
            $this->MultiCell($w,5, $tamilstr,0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function ChineseRow($data)
    {
        $this->SetFont('simhei','',12);
        // $this->SetFont('Big5','',20);
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++){
            $chinesestr = iconv('UTF-8', 'GBK//TRANSLIT', $data[$i]);
            // $chinesestr = iconv('GBK', 'UTF-8', $data[$i]);
            // $nb=max($nb,$this->NbLines($this->widths[$i],$chinesestr));
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
            // $nb = 20;
        }
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->Rect($x,$y,$w,$h);
            //Print the text
            $chinesestr = iconv('UTF-8', 'GBK//TRANSLIT', $data[$i]);
            // $chinesestr = iconv('GBK', 'UTF-8', $data[$i]);
            $this->MultiCell($w,5, $chinesestr,0,$a);
            // $this->MultiCell($w,5,$data[$i],0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function Row($data)
    {
        $this->SetFont('Times');
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->Rect($x,$y,$w,$h);
            //Print the text
            $this->MultiCell($w,5,$data[$i],0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger){
            $this->AddPage($this->CurOrientation);
            $this->Ln(25);
        }
            
    }

    function NbLines($w,$txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        // die(var_dump($cw));
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        // $s=str_replace("\r",'',$txt);
        $s=preg_replace("/\r/",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            // $c=$s[$i];
            // if($c=="\n")
            // {
            //     $i++;
            //     $sep=-1;
            //     $j=$i;
            //     $l=0;
            //     $nl++;
            //     continue;
            // }
            // if($c==' ')
            //     $sep=$i;
            // $l+=$cw[$c];
            $c=$s[$i];
            $ascii = (ord($c)<128);
            if($c=="\n")
            {
                // Explicit line break
                // $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                // if($border && $nl==2)
                //     $b = $b2;
                continue;
            }
            if(!$ascii)
            {
                $sep = $i;
                $ls = $l;
            }
            elseif($c==' ')
            {
                $sep = $i;
                $ls = $l;
            }
            $l += $ascii ? $cw[$c] : 1000;
            // if(!$cw[$c]) $l+=500; else $l+$cw[$c]; 
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }

    function BasicTable($data)
    {
        // Column widths
        $w = array(45, 70, 70);
        // Header
        // for($i=0;$i<count($header);$i++)
        //     $this->Cell($w[$i],7,$header[$i],1,0,'C');
        // $this->Ln();
        // Data
        foreach($data as $row)
        {
            // die(var_dump($row));
            $str = iconv('UTF-8', 'windows-1252', $row['title']);
            $this->Cell($w[0],7,$str,'LR');
            $this->Cell($w[1],7,$row['sem1'],'LR');
            $this->Cell($w[2],7,$row['sem2'],'LR');
            $this->Ln();
        }
        // Closing line
        $this->Cell(array_sum($w),0,'','T');
        $this->Ln(10);
    }

    function PrintTitle($title)
    {
        $this->SetFont('Times', 'B');
        $this->Cell(0, 5, $title);
        $this->Ln(5);
    }

    function PrintContent($item){

        // die(var_dump($item));
        $this->Ln(10);
        $this->SetFont('Times', 'B');
        $this->Cell(10, 10, 'Description :');
        $this->Cell(30);
        $this->Cell(10, 10, $item['product_name']);
        $this->Ln(5);
        $this->SetFont('Times', '');
        $this->Cell(10, 10, 'Size :');
        $this->Cell(30);
        $this->Cell(10, 10, $item["colour_card_product"]["no_page"] . ' pcs of ' . $item["colour_card_product"]["paper_size"]);
        $this->Ln(5);
        $this->Cell(10, 10, 'Type of Paint :');
        $this->Cell(30);
        $this->Cell(10, 10, $item['type_of_paint']);
        $this->Ln(5);
        $this->Cell(10, 10, 'No of colour chip :');
        $this->Cell(30);
        if(!empty($item['colour_chip'])){
            $i = 0;
            foreach($item['colour_chip'] as $colour_chip){

                if($i > 0){
                    $this->Cell(10, 10, '');
                    $this->Cell(30);
                    $this->Cell(10, 10, $colour_chip['print_colour_chip_additional']);
                } else {
                    $this->Cell(10, 10, $colour_chip['print_colour_chip_additional']);
                }
                $this->Ln(5);
                $i++;
            }
        } else {

            $this->Ln(5);
        }
        $this->Cell(10, 10, 'Color chip size :');
        $this->Cell(30);
        if(!empty($item['colour_chip'])){
            $i = 0;
            foreach($item["colour_chip"] as $colour_chip){
                
                if($i > 0){
                    $this->Cell(10, 10, '');
                    $this->Cell(30);
                    $this->Cell(10, 10, $colour_chip["no_colour_chip"] . ' colours ' . $colour_chip["colour_chip_height"] . ' cm (h) x ' . $colour_chip["colour_chip_width"] . ' cm(w)');
                } else {
                    $this->Cell(10, 10, $colour_chip["no_colour_chip"] . ' colours ' . $colour_chip["colour_chip_height"] . ' cm (h) x ' . $colour_chip["colour_chip_width"] . ' cm(w)');
                }
                $this->Ln(5);
                $i++;
            } 
        } else {

            $this->Ln(5);
        }
        $this->Cell(10, 10, 'Type of Paper :');
        $this->Cell(30);
        $this->Cell(10, 10, $item["colour_card_product"]["paper_type"]);
        $this->Ln(5);
        $this->Cell(10, 10, 'Offset Print :');
        $this->Cell(30);
        $this->Cell(10, 10, $item["colour_card_product"]["colour_height"] . ' colours x ' . $item["colour_card_product"]["colour_width"] . ' colours. ' . $item['print_special_colour']);
        $this->Ln(5);
        $this->Cell(10, 10, 'Lamination :');
        $this->Cell(30);
        $this->Cell(10, 10, $item['print_finishing']);
        $this->Ln(5);
        $this->Cell(10, 10, 'Finishing :');
        $this->Cell(30);
        $this->Cell(10, 10, $item['print_additional']);
        $this->Ln(10);
    }

    function PrintQuantity(){

        $this->Cell(10, 10, 'Quantity :');
        $this->Cell(30);
    }

    function PrintQuantityPieces($row){

        $this->Cell(10, 10, $row['quantity_pieces'] . ' pcs');
        $this->Cell(20);
    }

    function PrintUnitPrice(){

        $this->Ln(5);
        $this->Cell(10, 10, 'Unit Price :');
        $this->Cell(30);
    }

    function PrintUnitPrices($row){

        $this->Cell(10, 10, $row['unit_price']);
        $this->Cell(20);
    }

    function PrintTotalCost(){

        $this->Ln(5);
        $this->SetFont('Times', 'B');
        $this->Cell(10, 10, 'Total Cost :');
        $this->Cell(30);
    }

    function PrintTotalCosts($row){

        $this->SetFont('Times', 'BU');
        $this->Cell(10, 10, $row['total_cost']);
        $this->Cell(20);
    }

    function PrintNote($notes){

        $this->Ln(10);
        $this->SetFont('Times', '');
        $this->Cell(10, 10, 'Note :');

        foreach($notes as $row){
            $this->Ln(5);
            $this->Cell(10, 10, '* ' . $row['notes']);
        }
        
        // $this->Cell(10, 10, '* Colour will be match with higher tolerance value (Spectrophotometer)');
        // $this->Ln(5);
        // $this->Cell(10, 10, '* There will be a colour deviation of +/-3% for any printed offset colour');
        // $this->Ln(5);
        // $this->Cell(10, 10, '* A fee will be charged in the event of any amendmnents or cancellation afte the colours have been matched');
        // $this->Ln(5);
        // $this->Cell(10, 10, '* Price quoted on above are C.N.F Malaysia');
        // $this->Ln(5);
        // $this->Cell(10, 10, '* Client provide fine artwork in CD');
        // $this->Ln(5);
        // $this->Cell(10, 10, '* Above quoted price excluding special colour chip printing & pasting');
    }

    function PrintTnC($terms){

        $this->Ln(10);
        $this->SetFont('Times', 'B');
        $this->Cell(10, 10, 'Terms & Conditions :');
        $this->Ln(5);
        $this->SetFont('Times', '');

        foreach($terms as $row){

            $this->Cell(10, 10, $row['terms'] .' :');
            $this->Cell(40);
            $this->Cell(10, 10, $row['description']);
            $this->Ln(5);
        }
        // $this->Cell(10, 10, 'Mode of payment :');
        // $this->Cell(40);
        // $this->Cell(10, 10, 'Full payment after delivery');
        // $this->Ln(5);
        // $this->Cell(10, 10, 'Validity of Quotation :');
        // $this->Cell(40);
        // $this->Cell(10, 10, '30 days');
        // $this->Ln(5);
        // $this->Cell(10, 10, 'Document Required :');
        // $this->Cell(40);
        // $this->Cell(10, 10, 'Purchase Order');
    }

    function PrintFooter(){

        $this->Ln(10);
    }

    // function PrintInvoice($title)
    // {
    //     $this->AddPage();
    //     $this->InvoiceTitle($title);
    // }


    function AddCIDFont($family, $style, $name, $cw, $CMap, $registry)
    {
        $fontkey = strtolower($family).strtoupper($style);
        if(!isset($this->fonts[$fontkey])){
            $i = count($this->fonts)+1;
            $name = str_replace(' ','',$name);
            $this->fonts[$fontkey] = array('i'=>$i, 'type'=>'Type0', 'name'=>$name, 'up'=>-130, 'ut'=>40, 'cw'=>$cw, 'CMap'=>$CMap, 'registry'=>$registry);
        }
            // $this->Error("Font already added: $family $style");
    }
    
    function AddCIDFonts($family, $name, $cw, $CMap, $registry)
    {
        $this->AddCIDFont($family,'',$name,$cw,$CMap,$registry);
        $this->AddCIDFont($family,'B',$name.',Bold',$cw,$CMap,$registry);
        $this->AddCIDFont($family,'I',$name.',Italic',$cw,$CMap,$registry);
        $this->AddCIDFont($family,'BI',$name.',BoldItalic',$cw,$CMap,$registry);
    }
    
    function AddBig5Font($family='Big5', $name='MSungStd-Light-Acro')
    {
        // Add Big5 font with proportional Latin
        // $cw = $GLOBALS['Big5_widths'];
        $cw = $this->Big5_widths;
        $CMap = 'ETenms-B5-H';
        $registry = array('ordering'=>'CNS1', 'supplement'=>0);
        $this->AddCIDFonts($family,$name,$cw,$CMap,$registry);
    }
    
    function AddBig5hwFont($family='Big5-hw', $name='MSungStd-Light-Acro')
    {
        // Add Big5 font with half-witdh Latin
        for($i=32;$i<=126;$i++)
            $cw[chr($i)] = 500;
        $CMap = 'ETen-B5-H';
        $registry = array('ordering'=>'CNS1', 'supplement'=>0);
        $this->AddCIDFonts($family,$name,$cw,$CMap,$registry);
    }
    
    function AddGBFont($family='GB', $name='STSongStd-Light-Acro')
    {
        // Add GB font with proportional Latin
        // $cw = $GLOBALS['GB_widths'];
        $cw = $this->GB_widths;
        $CMap = 'GBKp-EUC-H';
        $registry = array('ordering'=>'GB1', 'supplement'=>2);
        $this->AddCIDFonts($family,$name,$cw,$CMap,$registry);
    }
    
    function AddGBhwFont($family='GB-hw', $name='STSongStd-Light-Acro')
    {
        // Add GB font with half-width Latin
        for($i=32;$i<=126;$i++)
            $cw[chr($i)] = 500;
        $CMap = 'GBK-EUC-H';
        $registry = array('ordering'=>'GB1', 'supplement'=>2);
        $this->AddCIDFonts($family,$name,$cw,$CMap,$registry);
    }
    
    function GetStringWidth($s)
    {
        if($this->CurrentFont['type']=='Type0')
            return $this->GetMBStringWidth($s);
        else
            return parent::GetStringWidth($s);
    }
    
    function GetMBStringWidth($s)
    {
        // Multi-byte version of GetStringWidth()
        $l = 0;
        $cw = &$this->CurrentFont['cw'];
        $nb = strlen($s);
        $i = 0;
        while($i<$nb)
        {
            $c = $s[$i];
            if(ord($c)<128)
            {
                $l += $cw[$c];
                $i++;
            }
            else
            {
                $l += 1000;
                $i += 2;
            }
        }
        return $l*$this->FontSize/1000;
    }
    
    function MultiCell($w, $h, $txt, $border=0, $align='L', $fill=0)
    {
        if($this->CurrentFont['type']=='Type0')
            $this->MBMultiCell($w,$h,$txt,$border,$align,$fill);
        else
            parent::MultiCell($w,$h,$txt,$border,$align,$fill);
    }
    
    function MBMultiCell($w, $h, $txt, $border=0, $align='L', $fill=0)
    {
        // Multi-byte version of MultiCell()
        $cw = &$this->CurrentFont['cw'];
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
        // $s = str_replace("\r",'',$txt);
        $s = preg_replace("/\r/",'',$txt);

        $nb = strlen($s);
        if($nb>0 && $s[$nb-1]=="\n")
            $nb--;
        $b = 0;
        if($border)
        {
            if($border==1)
            {
                $border = 'LTRB';
                $b = 'LRT';
                $b2 = 'LR';
            }
            else
            {
                $b2 = '';
                if(is_int(strpos($border,'L')))
                    $b2 .= 'L';
                if(is_int(strpos($border,'R')))
                    $b2 .= 'R';
                $b = is_int(strpos($border,'T')) ? $b2.'T' : $b2;
            }
        }
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        // var_dump($s);
        while($i<$nb)
        {
            // Get next character
            $c = $s[$i];
            // Check if ASCII or MB
            $ascii = (ord($c)<128);

            if($c=="\n")
            {
                // Explicit line break
                $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                if($border && $nl==2)
                    $b = $b2;
                continue;
            }
            if(!$ascii)
            {
                $sep = $i;
                $ls = $l;
            } else if($c==' '){
                $sep = $i;
                $ls = $l;
            }
            $l += $ascii ? $cw[$c] : 1000;
            // if($ascii) 
            //     $l+=1000; 
            // else 
            //     $l+$cw[$c]; 

            if($l>$wmax)
            {
                // Automatic line break
                if($sep==-1 || $i==$j)
                {
                    if($i==$j)
                        $i += $ascii ? 1 : 2;
                    $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
                }
                else
                {
                    $this->Cell($w,$h,substr($s,$j,$sep-$j),$b,2,$align,$fill);
                    // $i = ($s[$sep]==' ') ? $sep+1 : $sep;
                    // var_dump('1');
                    // $i = ($s[$sep]==' ') ? $sep+1 : $sep;
                    // $i = $sep+1;
                    // $i += $ascii ? 1 : 2;
                }
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                if($border && $nl==2)
                    $b = $b2;
            }
            else
                $i += $ascii ? 1 : 2;
        }
        // Last chunk
        if($border && is_int(strpos($border,'B')))
            $b .= 'B';
        $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
        $this->x = $this->lMargin;
    }
    
    function Write($h, $txt, $link='')
    {
        if($this->CurrentFont['type']=='Type0')
            $this->MBWrite($h,$txt,$link);
        else
            parent::Write($h,$txt,$link);
    }
    
    function MBWrite($h, $txt, $link)
    {
        // Multi-byte version of Write()
        $cw = &$this->CurrentFont['cw'];
        $w = $this->w-$this->rMargin-$this->x;
        $wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
        $s = str_replace("\r",'',$txt);
        $nb = strlen($s);
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while($i<$nb)
        {
            // Get next character
            $c = $s[$i];
            // Check if ASCII or MB
            $ascii = (ord($c)<128);
            if($c=="\n")
            {
                // Explicit line break
                $this->Cell($w,$h,substr($s,$j,$i-$j),0,2,'',0,$link);
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                if($nl==1)
                {
                    $this->x = $this->lMargin;
                    $w = $this->w-$this->rMargin-$this->x;
                    $wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
                }
                $nl++;
                continue;
            }
            if(!$ascii || $c==' ')
                $sep = $i;
            $l += $ascii ? $cw[$c] : 1000;
            if($l>$wmax)
            {
                // Automatic line break
                if($sep==-1 || $i==$j)
                {
                    if($this->x>$this->lMargin)
                    {
                        // Move to next line
                        $this->x = $this->lMargin;
                        $this->y += $h;
                        $w = $this->w-$this->rMargin-$this->x;
                        $wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
                        $i++;
                        $nl++;
                        continue;
                    }
                    if($i==$j)
                        $i += $ascii ? 1 : 2;
                    $this->Cell($w,$h,substr($s,$j,$i-$j),0,2,'',0,$link);
                }
                else
                {
                    $this->Cell($w,$h,substr($s,$j,$sep-$j),0,2,'',0,$link);
                    $i = ($s[$sep]==' ') ? $sep+1 : $sep;
                }
                $sep = -1;
                $j = $i;
                $l = 0;
                if($nl==1)
                {
                    $this->x = $this->lMargin;
                    $w = $this->w-$this->rMargin-$this->x;
                    $wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
                }
                $nl++;
            }
            else
                $i += $ascii ? 1 : 2;
        }
        // Last chunk
        if($i!=$j)
            $this->Cell($l/1000*$this->FontSize,$h,substr($s,$j,$i-$j),0,0,'',0,$link);
    }
    
    function _putType0($font)
    {
        // Type0
        $this->_newobj();
        $this->_out('<</Type /Font');
        $this->_out('/Subtype /Type0');
        $this->_out('/BaseFont /'.$font['name'].'-'.$font['CMap']);
        $this->_out('/Encoding /'.$font['CMap']);
        $this->_out('/DescendantFonts ['.($this->n+1).' 0 R]');
        $this->_out('>>');
        $this->_out('endobj');
        // CIDFont
        $this->_newobj();
        $this->_out('<</Type /Font');
        $this->_out('/Subtype /CIDFontType0');
        $this->_out('/BaseFont /'.$font['name']);
        $this->_out('/CIDSystemInfo <</Registry '.$this->_textstring('Adobe').' /Ordering '.$this->_textstring($font['registry']['ordering']).' /Supplement '.$font['registry']['supplement'].'>>');
        $this->_out('/FontDescriptor '.($this->n+1).' 0 R');
        if($font['CMap']=='ETen-B5-H')
            $W = '13648 13742 500';
        elseif($font['CMap']=='GBK-EUC-H')
            $W = '814 907 500 7716 [500]';
        else
            $W = '1 ['.implode(' ',$font['cw']).']';
        $this->_out('/W ['.$W.']>>');
        $this->_out('endobj');
        // Font descriptor
        $this->_newobj();
        $this->_out('<</Type /FontDescriptor');
        $this->_out('/FontName /'.$font['name']);
        $this->_out('/Flags 6');
        $this->_out('/FontBBox [0 -200 1000 900]');
        $this->_out('/ItalicAngle 0');
        $this->_out('/Ascent 800');
        $this->_out('/Descent -200');
        $this->_out('/CapHeight 800');
        $this->_out('/StemV 50');
        $this->_out('>>');
        $this->_out('endobj');
    }

    function EOHeader($logo, $info){

        $this->AddPage();

        $this->SetFont('Times', 'B');
        $this->image($logo['image'], 10, 20, -300);
        $this->Cell(50);
        $this->Cell(10, 10, $logo['company']);
        $this->ln(5);
        $this->SetFont('Times', '');
        $this->Cell(50);
        $this->Cell(10, 10, $logo['address']);
        $this->ln(5);
        $this->Cell(50);
        $this->Cell(10, 10, 'Tel : ');
        $this->Cell(10, 10, $logo['tel']);
        $this->Cell(40);
        $this->Cell(10, 10, 'Fax : ');
        $this->Cell(10, 10, $logo['fax']);
        $this->ln(5);
        $this->Cell(50);
        $this->Cell(15, 10, 'Email : ');
        $this->Cell(10, 10, $logo['email']);
        $this->Cell(40);
        $this->Cell(20, 10, 'Website : ');
        $this->Cell(10, 10, $logo['website']);

        $this->Ln(10);
        $this->Cell(80);
        $this->SetFont('Times', 'B');
        $this->Cell(10, 10, 'Exchange Order');

        $this->Line(5, 60, 210-5, 60);
        $this->Ln(20);

        $this->SetFont('Times');

        $this->Cell(10, 10, 'To :');
        $this->Cell(10);
        $this->Cell(10, 10, $info['airline']);
        $this->Cell(70);
        $this->Cell(20, 10, 'Doc No :', 0, 0, 'R');
        $this->Cell(20);
        $this->Cell(50, 10, $info['eo_number'], 0, 0, 'R');
        $this->Ln(5);

        $this->Cell(100);
        $this->Cell(20, 10, 'Date :', 0, 0, 'R');
        $this->Cell(20);
        $this->Cell(50, 10, $info['date'], 0, 0, 'R');
        $this->Ln(5);

        $this->Cell(100);
        $this->Cell(20, 10, 'Page :', 0, 0, 'R');
        $this->Cell(20);
        $this->Cell(56, 10, $this->PageNo().' of {nb}', 0, 0, 'R');
        $this->Ln(5);

        $this->Cell(100);
        $this->Cell(20, 10, 'Printed Date :', 0, 0, 'R');
        $this->Cell(20);
        $this->Cell(50, 10, $info['print_date'], 0, 0, 'R');
        $this->Ln(5);

        $this->Cell(10, 10, 'Attn :');
        $this->Cell(10);
        $this->Cell(10, 10, $info['attn']);
        $this->Cell(70);
        $this->Cell(20, 10, 'Issued by :', 0, 0, 'R');
        $this->Cell(20);
        $this->Cell(50, 10, $info['issued_by'], 0, 0, 'R');
        $this->Ln(5);

        $this->Cell(10, 10, 'Remark :');
        $this->Cell(10);
        $this->Cell(10, 10, $info['remark']);
        $this->Ln(20);
    }

    function EOFlight($info){

        $this->Line(5, 110, 210-5, 110);
        $this->Line(5, 120, 210-5, 120);

        $this->Cell(10, 10, 'No');
        $this->Cell(5);
        $this->Cell(10, 10, 'Origin/Destination');
        $this->Cell(35);
        $this->Cell(10, 10, 'Flight');
        $this->Cell(15);
        $this->Cell(10, 10, 'Class');
        $this->Cell(15);
        $this->Cell(10, 10, 'Date');
        $this->Cell(25);
        $this->Cell(10, 10, 'Time');
        $this->Cell(20);
        $this->Cell(10, 10, 'PNR');
        $this->Ln(12);

        $i = 1;
        foreach($info as $row){

            $this->Cell(10, 5, $i);
            $this->Cell(5);
            $this->Cell(10, 5, $row['origin']);
            $this->Cell(35);
            $this->Cell(10, 5, $row['flight']);
            $this->Cell(15);
            $this->Cell(10, 5, $row['class']);
            $this->Cell(15);
            $this->Cell(10, 5, $row['date']);
            $this->Cell(25);
            $this->Cell(10, 5, $row['time']);
            $this->Cell(20);
            $this->Cell(10, 5, $row['pnr']);

            $this->Ln(8);
            $i++;
        }
    }

    function EOPNR($info){

        $x=$this->GetX();
        $y=$this->GetY();

        $this->Line(5, $y, 210-5, $y);
        $this->Line(5, $y + 10, 210-5, $y + 10);

        // $this->SetY(-140);
        $this->Cell(10, 10, 'No');
        $this->Cell(5);
        $this->Cell(10, 10, 'Description');
        $this->Cell(70);
        $this->Cell(10, 10, 'Tax');
        $this->Cell(15);
        $this->Cell(10, 10, 'Price');
        $this->Cell(18);
        $this->Cell(10, 10, 'Qty');
        $this->Cell(12);
        $this->Cell(10, 10, 'Amount');
        $this->Ln(12);

        $i = 1;
        foreach($info as $row){

            $x=$this->GetX();
            $y=$this->GetY();

            $this->Cell(10, 5, $i);
            $this->Cell(5);
            $this->MultiCell(80, 5, $row['description']);

            $this->SetXY($x + 85, $y);
            $this->Cell(10);
            $this->Cell(10, 5, $row['tax']);
            $this->Cell(15);
            $this->Cell(10, 5, $row['price']);
            $this->Cell(15);
            $this->Cell(10, 5, $row['quantity'], 0, 0, 'R');
            $this->Cell(15);
            $this->Cell(18, 5, $row['amount'], 0, 0, 'R');
            $this->Ln(15);
            $i++;
        }

        // $nb=0;
        // for($i=0;$i<count($data);$i++)
        //     $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        // $h=5*$nb;
        // //Issue a page break first if needed
        // $this->CheckPageBreak($h);
        // //Draw the cells of the row
        // for($i=0;$i<count($data);$i++)
        // {
        //     $w=$this->widths[$i];
        //     $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //     //Save the current position
        //     $x=$this->GetX();
        //     $y=$this->GetY();
        //     //Draw the border
        //     $this->Rect($x,$y,$w,$h);
        //     //Print the text
        //     $this->MultiCell($w,5,$data[$i],0,$a);
        //     //Put the position to the right of the cell
        //     $this->SetXY($x+$w,$y);
        // }
        // //Go to the next line
        // $this->Ln($h);
    }

    function EOFooter($info, $finance, $balance){

        $this->SetFont('Times', 'B');
        $x=$this->GetX();
        $y=$this->GetY();

        $this->Line(5, $y, 210-5, $y);
        // $this->SetY(-55);
        $this->Cell(120);
        $this->Cell(40, 10, 'Application Fare : MYR', 0, 0, 'R');
        $this->Cell(30, 10, $info['first_payment'], 0, 0, 'R');
        $this->Ln(5);
        $this->Cell(120);
        $this->Cell(40, 10, 'Tax 1 : MYR', 0, 0, 'R');
        $this->Cell(30, 10, $info['second_payment'], 0, 0, 'R');
        $this->Ln(5);
        $this->Cell(120);
        $this->Cell(40, 10, 'Tax 2 : MYR', 0, 0, 'R');
        $this->Cell(30, 10, $info['third_payment'], 0, 0, 'R');
        $this->Ln(5);
        $this->Cell(120);
        $this->Cell(40, 10, 'TOTAL : MYR', 0, 0, 'R');
        $this->Cell(30, 10, $info['total_amount'], 0, 0, 'R');
        
        foreach($finance as $row){
            $this->Ln(5);
            $this->Cell(120);
            $this->Cell(40, 10, 'Paid on ' . $row['payment_date'] . ' : MYR', 0, 0, 'R');
            $this->Cell(30, 10, $row['amount'], 0, 0, 'R');
        }

        if($balance != 0){
            $this->Ln(5);
            $this->Cell(120);
            $this->Cell(40, 10, 'Balance : MYR', 0, 0, 'R');
            $this->Cell(30, 10, $balance, 0, 0, 'R');
        }

    }

    function POHeader($logo, $info){

        $this->AddPage();

        $this->SetFont('Times', 'B');
        $this->image($logo['image'], 10, 20, -300);
        $this->Cell(50);
        $this->Cell(10, 10, $logo['company']);
        $this->ln(5);
        $this->SetFont('Times', '');
        $this->Cell(50);
        $this->Cell(10, 10, $logo['address']);
        $this->ln(5);
        $this->Cell(50);
        $this->Cell(10, 10, 'Tel : ');
        $this->Cell(10, 10, $logo['tel']);
        $this->Cell(40);
        $this->Cell(10, 10, 'Fax : ');
        $this->Cell(10, 10, $logo['fax']);
        $this->ln(5);
        $this->Cell(50);
        $this->Cell(15, 10, 'Email : ');
        $this->Cell(10, 10, $logo['email']);
        $this->Cell(40);
        $this->Cell(20, 10, 'Website : ');
        $this->Cell(10, 10, $logo['website']);

        $this->Ln(10);
        $this->Cell(80);
        $this->SetFont('Times', 'B');
        $this->Cell(10, 10, 'Purchase Order');

        // $this->Line(5, 60, 210-5, 60);
        $this->Ln(10);

        $this->SetFont('Times');

        $this->Cell(5);
        $this->Cell(90, 10, '', 'LTR', 0 , 'L', 0);
        $this->Cell(90, 10, '', 'LTR', 0 , 'L', 0);
        $this->Ln(5);
        $this->Cell(5);
        $this->Cell(5, 10, '', 'L', 0 , 'L', 0);
        $this->Cell(10, 5, 'To :');
        $this->Cell(10);
        // $this->Cell(10, 10, $info['supplier']);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->MultiCell(60, 5, $info['supplier']);
        // $this->Cell(60);
        $this->SetXY($x + 70, $y);
        $this->Cell(20, 5, 'Page :');
        $this->Cell(20);
        $this->Cell(50, 5, $this->PageNo().' of {nb}');
        $this->Ln(5);

        $this->Cell(5);
        $this->Cell(5, 10, '', 'L', 0 , 'L', 0);
        // $this->Cell(10, 10, 'Attn :');
        $this->Cell(30);
        // $this->Cell(10, 10, $info['attn']);
        $this->Cell(55, 10, '', 'R', 0 , 'L', 0);
        $this->Cell(5);
        $this->Cell(20, 10, 'Date :');
        $this->Cell(20);
        $this->Cell(45, 10, $info['date'], 'R', 0 , 'L', 0);
        $this->Ln(5);

        $this->Cell(5);
        $this->Cell(5, 10, '', 'L', 0 , 'L', 0);
        $this->Cell(10, 10, 'Attn :');
        $this->Cell(10);
        $this->Cell(10, 10, $info['attn']);
        $this->Cell(55, 10, '', 'R', 0 , 'L', 0);
        $this->Cell(5);
        $this->Cell(20, 10, 'P. O. No :');
        $this->Cell(20);
        $this->Cell(45, 10, $info['po_number'], 'R', 0 , 'L', 0);
        $this->Ln(5);

        $this->Cell(5);
        $this->Cell(5, 10, '', 'L', 0 , 'L', 0);
        $this->Cell(10, 10, 'TEL :');
        $this->Cell(10);
        $this->Cell(10, 10, $info['tel']);
        $this->Cell(55, 10, '', 'R', 0 , 'L', 0);
        $this->Cell(5);
        $this->Cell(20, 10, 'Currency :');
        $this->Cell(20);
        $this->Cell(45, 10, $info['currency'], 'R', 0 , 'L', 0);
        $this->Ln(5);

        $this->Cell(5);
        $this->Cell(5, 10, '', 'L', 0 , 'L', 0);
        $this->Cell(10, 10, 'FAX :');
        $this->Cell(10);
        $this->Cell(10, 10, $info['fax']);
        $this->Cell(55, 10, '', 'R', 0 , 'L', 0);
        $this->Cell(5);
        $this->Cell(20, 10, 'Payment Terms :');
        $this->Cell(20);
        $this->Cell(45, 10, $info['payment_terms'], 'R', 0 , 'L', 0);
        $this->Ln(7);

        $x=$this->GetX();
        $y=$this->GetY();

        $this->Cell(5);
        $this->Cell(5, 10, '', 'L', 0 , 'L', 0);
        $this->Cell(10, 5, 'EMAIL :');
        $this->Cell(10);
        $this->Cell(10, 5, $info['email']);
        $this->Cell(55, 10, '', 'R', 0 , 'L', 0);
        $this->Cell(5, 10, '', 'L', 0 , 'L', 0);
        $this->Cell(20, 5, 'Tour Code :', '', 0 , 'L', 0);
        $this->Cell(20, 10, '', '', 0 , 'L', 0);
        $this->MultiCell(45, 5, $info['tour_code']);

        $this->SetXY($x, $y + 1);
        $this->Cell(5);
        $this->Cell(90, 10, '', 'BLR', 0 , 'L', 0);
        $this->Cell(90, 10, '', 'BLR', 0 , 'L', 0);

        $this->Ln(15);

    }

    function POBody($info, $net_total){

        $this->Line(5, 103, 210-5, 103);
        $this->Line(5, 113, 210-5, 113);

        $this->Cell(5);
        $this->Cell(10, 10, 'No');
        $this->Cell(5);
        $this->Cell(10, 10, 'Product');
        $this->Cell(40);
        $this->Cell(25, 10, 'QTY', 0, 0, 'R');
        $this->Cell(10);
        $this->Cell(10, 10, 'UOM', 0, 0, 'R');
        $this->Cell(15);
        $this->Cell(20, 10, 'U. P.', 0, 0, 'R');
        $this->Cell(15);
        $this->Cell(20, 10, 'Amount', 0, 0, 'R');
        $this->Ln(15);

        $i = 1;
        foreach($info as $row){

            $this->Cell(5);
            $this->Cell(10, 5, $i);
            $this->Cell(5);

            $x=$this->GetX();
            $y=$this->GetY();
            $this->MultiCell(50, 5, $row['product']);
            $nb=0;
            $nb=max($nb,$this->NbLines(0, $row['product']));
            $h=5*$nb;
            $this->SetXY($x + 60, $y);

            $this->Cell(10, 5, $row['quantity'], 0, 0, 'R');
            $this->Cell(15);
            $this->Cell(10, 5, $row['uom'], 0, 0, 'R');
            $this->Cell(15);
            $this->Cell(20, 5, $row['unit_price'], 0, 0, 'R');
            $this->Cell(15);
            $this->Cell(20, 5, $row['amount'], 0, 0, 'R');
            $this->Ln($h);

            if($row['remark'] != ''){
                $this->Cell(20);
                $this->MultiCell(60, 5, 'Remark : ' . $row['remark']);
                $nb2=0;
                $nb2=max($nb2,$this->NbLines(0, $row['remark']));
                $h=5*$nb2;
            }

            $this->Ln(8);
            $i++;
        }

        $this->Line(5, 220, 210-5, 220);
        $this->Line(5, 230, 210-5, 230);
        $this->SetY(-77);
        $this->Cell(130);
        $this->Cell(10, 10, 'Net Total :');
        $this->Cell(45, 10, $net_total, 0, 0, 'R');
        $this->ln(10);
    }

    function POFooter($prepared_by){

        $this->Cell(5);
        $this->Cell(10, 10, 'Prepared By');
        $this->Cell(130);
        $this->Cell(10, 10, 'Approved By');
        $this->ln(15);
        $this->Cell(20);
        $this->Cell(10, 10, $prepared_by);
        $this->ln(10);
        $this->Cell(120);
        $this->Cell(10, 10, '_________________________________');
        $this->ln(5);
        $this->Cell(45);
        $this->Cell(10, 10, 'This document is system-generated. No signatures are required.');
    }

    function INHeader($logo, $info){

        $this->AddPage();

        $this->SetFont('Times', 'B');
        $this->image($logo['image'], 10, 20, -300);
        $this->Cell(50);
        // $this->Cell(10, 10, $logo['company']);
        // $this->ln(5);
        // $this->SetFont('Times', '');
        // $this->Cell(50);
        // $this->Cell(10, 10, $logo['address']);
        // $this->ln(5);
        // $this->Cell(50);
        // $this->Cell(10, 10, 'Tel : ');
        // $this->Cell(10, 10, $logo['tel']);
        // $this->Cell(40);
        // $this->Cell(10, 10, 'Fax : ');
        // $this->Cell(10, 10, $logo['fax']);
        // $this->ln(5);
        // $this->Cell(50);
        // $this->Cell(15, 10, 'Email : ');
        // $this->Cell(10, 10, $logo['email']);
        $this->ln(15);

        $this->Cell(40);
   
        $this->Ln(10);
        $this->Cell(80);
        $this->SetFont('Times', 'B');
        $this->Cell(10, 10, 'INVOICE');

        $this->Line(5, 60, 210-5, 60);
        $this->Ln(20);

        $this->SetFont('Times');

        $this->Cell(10, 10, 'To :');
        $this->Cell(10);
        $this->Cell(10, 10, $info['client']);
        $this->Cell(70);
        $this->Cell(20, 10, 'Invoice No :', 0, 0, 'R');
        $this->Cell(20);
        $this->Cell(50, 10, $info['invoice_no'], 0, 0, 'R');
        $this->Ln(5);

        $this->Cell(10, 10, 'Address :');
        $this->Cell(10);
        $this->Cell(10, 10, $info['address']);
        $this->Cell(70);
        $this->Cell(20, 10, 'Date :', 0, 0, 'R');
        $this->Cell(20);
        $this->Cell(50, 10, $info['date'], 0, 0, 'R');
        $this->Ln(5);

        $this->Cell(10, 10, 'Contact :');
        $this->Cell(10);
        $this->Cell(10, 10, $info['tel']);
        $this->Cell(70);
        $this->Cell(20, 10, 'Page :', 0, 0, 'R');
        $this->Cell(20);
        $this->Cell(56, 10, $this->PageNo().' of {nb}', 0, 0, 'R');
        $this->Ln(5);

    


        $this->Cell(10, 10, 'Business Name :');
        $this->Cell(20);
        $this->Cell(10, 10, $info['Business_Name']);
        $this->Ln(20);
        $this->Ln(10);

    }   

    function INBody($info, $grand_total){

        $this->Line(5, 110, 210-5, 110);
        $this->Line(5, 120, 210-5, 120);

        $this->Cell(5);
        $this->Cell(10, 10, 'No');
        $this->Cell(5);
        $this->Cell(10, 10, 'Description');
        $this->Cell(55);
        $this->Cell(25, 10, 'QTY', 0, 0, 'R');
        $this->Cell(20);
        $this->Cell(10, 10, 'UNIT (RM)', 0, 0, 'R');
        $this->Cell(25);
        $this->Cell(20, 10, 'AMOUNT (RM)', 0, 0, 'R');
        $this->Ln(10);

        $i = 1;
        foreach($info as $row){

            $this->Cell(5);
            $this->Cell(10, 10, $i);
            $this->Cell(5);
            $this->Cell(50, 10, $row['description']);
            $this->Cell(15);
            $this->Cell(25, 10, $row['quantity'], 0, 0, 'R');
            $this->Cell(20);
            $this->Cell(10, 10, $row['unit_price'], 0, 0, 'R');
            $this->Cell(25);
            $this->Cell(20, 10, $row['amount'], 0, 0, 'R');


            $h = 10;
            if($row['remark'] != ''){
                $this->Ln(8);
                $this->Cell(20);
                $x=$this->GetX();
                $y=$this->GetY();
                $this->MultiCell(60, 5, $row['remark']);
                $nb=0;
                $nb=max($nb,$this->NbLines(0, $row['remark']));
                $h=5*$nb;
            }
            $this->Ln($h);

            $i++;
        }

        $this->Line(5, 220, 210-5, 220);
        $this->SetY(-77);
        $this->SetFont('Times', '', 9);
        $this->Cell(120, 10, 'N. B. PAYMENT BY CHEQUE SHOULD BE CROSSED AND MADE PAYABLE TO');
        $this->SetFont('Times', 'B', 12);
        $this->Cell(20, 10, 'GRAND TOTAL :');
        $this->Cell(45, 10, 'RM ' . $grand_total, 0, 0, 'R');
        $this->ln(5);
        $this->SetFont('Times', 'B', 9);
        $this->Cell(10);
        $this->Cell(110, 10, 'Company Sdn Bhd');
        $this->ln(5);
        $this->SetFont('Times', '', 9);
        $this->Cell(10);
        $this->Cell(110, 10, 'Public Bank Account No: 123 123 123');
    }
    //     function test_price(){
        
	
// /*A4 width : 219mm*/

// $pdf = new FPDF('P','mm','A4');

// $pdf->AddPage();
// /*output the result*/

// /*set font to arial, bold, 14pt*/
// $pdf->SetFont('Arial','B',20);

// /*Cell(width , height , text , border , end line , [align] )*/

// $pdf->Cell(71 ,10,'',0,0);
// $pdf->Cell(59 ,5,'Invoice',0,0);
// $pdf->Cell(59 ,10,'',0,1);

// $pdf->SetFont('Arial','B',15);
// $pdf->Cell(71 ,5,'WET',0,0);
// $pdf->Cell(59 ,5,'',0,0);
// $pdf->Cell(59 ,5,'Details',0,1);

// $pdf->SetFont('Arial','',10);

// $pdf->Cell(130 ,5,'Near DAV',0,0);
// $pdf->Cell(25 ,5,'Customer ID:',0,0);
// $pdf->Cell(34 ,5,'0012',0,1);

// $pdf->Cell(130 ,5,'Delhi, 751001',0,0);
// $pdf->Cell(25 ,5,'Invoice Date:',0,0);
// $pdf->Cell(34 ,5,'12th Jan 2019',0,1);
 
// $pdf->Cell(130 ,5,'',0,0);
// $pdf->Cell(25 ,5,'Invoice No:',0,0);
// $pdf->Cell(34 ,5,'ORD001',0,1);


// $pdf->SetFont('Arial','B',15);
// $pdf->Cell(130 ,5,'Bill To',0,0);
// $pdf->Cell(59 ,5,'',0,0);
// $pdf->SetFont('Arial','B',10);
// $pdf->Cell(189 ,10,'',0,1);



// $pdf->Cell(50 ,10,'',0,1);

// $pdf->SetFont('Arial','B',10);
// /*Heading Of the table*/
// $pdf->Cell(10 ,6,'Sl',1,0,'C');
// $pdf->Cell(80 ,6,'Description',1,0,'C');
// $pdf->Cell(23 ,6,'Qty',1,0,'C');
// $pdf->Cell(30 ,6,'Unit Price',1,0,'C');
// $pdf->Cell(20 ,6,'Sales Tax',1,0,'C');
// $pdf->Cell(25 ,6,'Total',1,1,'C');/*end of line*/
// /*Heading Of the table end*/
// $pdf->SetFont('Arial','',10);
//     for ($i = 0; $i <= 10; $i++) {
// 		$pdf->Cell(10 ,6,$i,1,0);
// 		$pdf->Cell(80 ,6,'HP Laptop',1,0);
// 		$pdf->Cell(23 ,6,'1',1,0,'R');
// 		$pdf->Cell(30 ,6,'15000.00',1,0,'R');
// 		$pdf->Cell(20 ,6,'100.00',1,0,'R');
// 		$pdf->Cell(25 ,6,'15100.00',1,1,'R');
// 	}
		

// $pdf->Cell(118 ,6,'',0,0);
// $pdf->Cell(25 ,6,'Subtotal',0,0);
// $pdf->Cell(45 ,6,'151000.00',1,1,'R');


// $pdf->Output();

//     }

    function INFooter($info, $balance){

        $this->ln(10);
        $this->Cell(10);
        $this->Cell(120, 10, 'GOODS REVEIVED IN GOOD ORDER & CONDITION AND GOOD SOLD IS NON-REFUNTABLE.');

        foreach($info as $row){
            $this->ln(5);
            $this->Cell(35);
            $this->Cell(50, 10, 'Payment Received on ' . $row['payment_date']);
            $this->Cell(40, 10, $row['payment_code']);
            $this->Cell(30, 10, $row['payment_channel']);
            $this->Cell(30, 10, 'RM ' . $row['amount'], 0, 0, 'R');
        }

        if($balance > 0){
            $this->ln(5);
            $this->Cell(125);
            $this->Cell(30, 10, 'Balance : ');
            $this->Cell(30, 10, 'RM ' . $balance, 0, 0, 'R');
        }

    }

    function Receipt($logo, $info){

        $this->AddPage();

        $this->SetFont('Times', 'B');
        $this->image($logo['image'], 10, 20, -300);
        // $this->Cell(50);
        // $this->Cell(10, 10, []);
        // $this->ln(5);
        // $this->SetFont('Times', '');
        // $this->Cell(50);
        // $this->Cell(10, 10, []);
        // $this->ln(5);
        // $this->Cell(50);
        // $this->Cell(10, 10, 'Tel : ');
        // $this->Cell(10, 10, []);
        // $this->Cell(40);
        // $this->Cell(10, 10, 'Fax : ');
        // $this->Cell(10, 10,[]);
        // $this->ln(5);
        // $this->Cell(50);
        // $this->Cell(15, 10, 'Email : ');
        // $this->Cell(10, 10, []);
        // $this->Cell(40);
        // $this->Cell(20, 10, 'Website : ');
        // $this->Cell(10, 10, []);
        $this->Ln(50);

        $this->SetFont('Times');
        $this->Cell(10);
        $this->Cell(50, 10, 'INVOICE NO :');
        $this->Cell(15, 10, $info['invoice_no']);
        $this->Cell(35);
        $this->Cell(20, 10, 'RECEIPT NO :');
        $this->Cell(20);
        $this->Cell(50, 10, $info['receipt_no']);
        $this->Ln(5);

        $this->Cell(10);
        $this->Cell(50, 10, "MEMBER'S NAME :");
        $this->Cell(15, 10, $info['client']);
        $this->Cell(35);
        $this->Cell(20, 10, 'DATE :');
        $this->Cell(20);
        $this->Cell(50, 10, $info['date']);
        $this->Ln(5);

        $this->Cell(10);
        $this->Cell(50, 10, "TOTAL AMOUNT (MYR) :");
        $this->Cell(15, 10, $info['amount']);
        $this->Ln(5);

        $this->Cell(10);
        $this->Cell(50, 10, "ENGLISH AMOUNT");
        $this->Cell(15, 10, $info['english_amount']);
        $this->Ln(5);

        $this->Cell(10);
        $this->Cell(50, 10, "(MYR) :");
        $this->Ln(5);

        $this->Cell(10);
        $this->Cell(50, 10, "MODE OF PAYMENT :");
        $this->Cell(15, 10, $info['payment_method']);
        $this->Ln(5);

    

        $this->Cell(10);
        $this->Cell(50, 10, "REMARK :");
        $this->Cell(15, 10, $info['remark']);
        $this->Ln(15);

        $this->Cell(10);
        $this->SetFont('Times', '', '10');
        $this->Cell(50, 10, "*Official Receipt shall only be considered valid upon clearance of all monies");
        $this->Ln(10);

        $this->Cell(120);
        $this->Cell(15, 10, $info['prepared_by']);
        $this->Ln(5);

        $this->Cell(110);
        $this->Cell(15, 10, '_____________________');
        $this->Cell(30);
        $this->Cell(15, 10, '_____________________');
        $this->Ln(5);

        $this->Cell(115);
        $this->Cell(15, 10, 'PREPARED BY');
        $this->Cell(33);
        $this->Cell(15, 10, 'AUTHORISED');
        $this->Ln(5);
        $this->Cell(165);
        $this->Cell(15, 10, 'SIGNATURE');

    }

}

?>