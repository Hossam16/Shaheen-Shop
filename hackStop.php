<html>
  <head>
    <title>reCAPTCHA demo: Simple page</title>
     <script src="https://www.google.com/reCAPTCHA/api.js" async defer></script>
     <script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
 </script>
  </head>
  <body>
    <form action="?" method="POST">
      <div class="g-reCAPTCHA" data-sitekey="6LeIEr0ZAAAAALoHxo9PKb8g0pOeNNT5gBookNJZ"></div>
      <br/>
      <button class="g-recaptcha" 
        data-sitekey="6LeIEr0ZAAAAALoHxo9PKb8g0pOeNNT5gBookNJZ" 
        data-callback='onSubmit' 
        data-action='submit'>Submit</button>
    </form>
  </body>
</html>