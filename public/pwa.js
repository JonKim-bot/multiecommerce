        if('serviceWorker' in navigator){
            navigator.serviceWorker.register('https://piegendevelop.com/service-worker.js');
            console.log("registered");
        }else{
         console.log("didn register");
        }
        var deferredPrompt;
        const addBtn = document.querySelector('.add-button');
window.addEventListener('beforeinstallprompt', function(e) {
  console.log('beforeinstallprompt Event fired');
  e.preventDefault();

  // Stash the event so it can be triggered later.
  deferredPrompt = e;

  return false;
});

addBtn.addEventListener('click', function() {
  if(deferredPrompt !== undefined) {
    // The user has had a postive interaction with our app and Chrome
    // has tried to prompt previously, so let's show the prompt.
    deferredPrompt.prompt();

    // Follow what the user has done with the prompt.
    deferredPrompt.userChoice.then(function(choiceResult) {

      console.log(choiceResult.outcome);

      if(choiceResult.outcome == 'dismissed') {
        console.log('User cancelled home screen install');
      }
      else {
        console.log('User added to home screen');
      }

      // We no longer need the prompt.  Clear it up.
      deferredPrompt = null;
    });
  }
});
    //     navigator.serviceWorker.getRegistrations().then(registrations => {
    //         let deferredPrompt;
    // const addBtn = document.querySelector('.add-button');
    // // addBtn.style.display = 'none';
    
    // window.addEventListener('beforeinstallprompt', (e) => {
    //     // alert("asd");
    //   // Prevent Chrome 67 and earlier from automatically showing the prompt
    //   e.preventDefault();
    //   // Stash the event so it can be triggered later.
    //   deferredPrompt = e;
    //   // Update UI to notify the user they can add to home screen
    //   addBtn.style.display = 'block';
    
    //   addBtn.addEventListener('click', (e) => {
    //     e.preventDefault();
    //     // Stash the event so it can be triggered later.
    //     deferredPrompt = e;
    //     // hide our user interface that shows our A2HS button
    //     // addBtn.style.display = 'none';
    //     // Show the prompt
    //     deferredPrompt.prompt();
    //     // Wait for the user to respond to the prompt
    //     deferredPrompt.userChoice.then((choiceResult) => {
    //         if (choiceResult.outcome === 'accepted') {
    //           console.log('User accepted the A2HS prompt');
    //         } else {
    //           console.log('User dismissed the A2HS prompt');
    //         }
    //         deferredPrompt = null;
    //       });
    //   });
    // });
    //     });
