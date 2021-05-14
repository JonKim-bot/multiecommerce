<?php
// This example sets up an endpoint using the Slim framework.
// Watch this video to get started: https://youtu.be/sGcNPFX1Ph4.
require_once(APPPATH.'libraries/Stripe/init.php');

$publishableKey="pk_test_51H935cGhhRPEG9xDw1kCIof2fpKVfOdXUsiKglYgptMuHnqlLNDkgkIqeAloJIgEsgpRcN5Fn8PFq48XzVtWahpJ00buPFyDTj";

$secretKey="sk_test_51H935cGhhRPEG9xD04m5rEGNWCySrJAZqTd52HR0qPQ8JTnOYIRKkZLgkaznnKrGaxvSW4XH2HlLqs7JXwTNIPXD00ciyuybT0";

\Stripe\Stripe::setApiKey($secretKey);



