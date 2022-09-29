<!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta name="ridox" content="f5227c09">
       <title>Document</title>
       <link rel="stylesheet" href="index.css">
       <script src="jquery-3.6.0.min.js"></script>
   </head>
   <body>
        <main>
        

      
       
   
   
    <div class="verify_modal">
        <div class="verify-wrapper">
            <h3>Add and verify Website OwnerShip in php</h3>
            <form action="" method="post" id="verify-form">
                <input type="url" placeholder="Url" id="url" name="url">
                <input type="submit" value="verify" id="submit-code" name="verify">
                <br>
                <button type="reset">reset code</button>
            </form>
            <div class="unquieKey">

            </div>
            <div class="errormsg" styl="display:none;">
                
            </div>
        </div>
        
    </div>
    <script>
        const url = document.querySelector('#url');
        let otp = "";

        let otpGenerator = () => {
            const digits = '0123456789abcdef';
            let otp = "";
            for (let index = 0; index < 8; index++) {
              otp+=digits[Math.floor(Math.random() * 16)];

                
            }
            return otp;
        }

        url.addEventListener('input', () => {
            let urlValue = url.value;
            otp = otpGenerator();
            console.log(otp);

            document.querySelector('.unquieKey').innerText = `<meta name="ridox" content="${otp}">`;

        })
        
        $(document).ready(function () {

            $('#verify-form').submit( (event) => {
                
                event.preventDefault();
                $('.errormsg').load('inc/verify.inc.php', {
                    otp: otp,
                    url: url.value
                })

            })

        
        
    });
    </script>
  
