//Pathirana I.K.R
function submitForm() {
  document.querySelector('.button').disabled = true;


  document.querySelector('.button').innerHTML = '<i class="fa fa-spinner fa-spin"></i> Sending...';


  setTimeout(function () {

    document.getElementById('cfrm').reset();


    document.querySelector('.button').innerHTML = 'Submit';
    document.querySelector('.button').disabled = false;


    alert('Thank you for your message! We will get back to you soon.');
  }, 2000);
}
