<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://kit.fontawesome.com/7846b9013f.js" crossorigin="anonymous"></script>
  <style>
    /*===== GOOGLE FONTS =====*/
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap");
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

    /* CSS VARIABLES */
    :root {
    --header-height: 3rem;
    /*========== Colors ==========*/
    --first-color: #1abc9c;
    --first-color-light: #26a69a44;
    --first-color-lighter: #ecf3f2;
    --title-color: #11443f;
    --text-color: #5b7b78;
    --body-color: #f5fffe;
    --logo-blue-light: #2aa5e8;
    --logo-yellow-light: #ffcb2a;
    --logo-blue-dark: #34a5e7;
    --logo-yellow-dark: #fda32b;
    /*========== Font and typography ==========*/
    --body-font: "Poppins", sans-serif;
    --biggest-font-size: 3rem;
    --bigger-font-size: 2rem;
    --big-font-size: 1.25rem;
    --normal-font-size: 0.938rem;
    /*========== Font weight ==========*/
    --font-medium: 500;
    --font-semi-bold: 600;
    /*========== z index ==========*/
    --z-tooltip: 10;
    --z-fixed: 100;
    }

    /*===== CSS RESET =====*/
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    }

    .postcard {
    display: flex;
    flex-direction: column;
    
    font-family: "Poppins", sans-regular;
    
    max-width:  350px;
    height: fit-content;
    
    position:absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);

    padding: 15px;
    
    border-radius: 15px;
    text-align: center;
    
    
    box-shadow: -1px 0px 15px -1px rgba(0,0,0,0.25);
    transition: 550ms box-shadow cubic-bezier(0.37, 0, 0, 0.96), 
                550ms transform cubic-bezier(0.37, 0, 0, 0.96);
    }

    .postcard:hover {
    transform: scale(1.02) translate(-50%, -50%);
    box-shadow: -1px 0px 55px -1px rgba(0,0,0,0.15);
    }

    .postcard__header {
    /*   justify-content: center;
    align-items: center; */
    
    height:100px;
    }

    .postcard__header h1, .postcard__header i {
    margin-top: 15px;
    }

    .postcard__header h1 {
    color: #34495e;
    }

    .postcard__header i {
    color: var(--first-color);
    }

    .postcard__body p{
    margin: 0 0 10px 0;
    }

    .postcard__body a{
    font-size: 14px;
    font-decoration: none;
    color: white;
    
    background-color: var(--first-color);
    
    padding: .25rem 2rem;
    border-radius: 16px;
    
    transition: 150ms background-color ease-out;
    
    }

    .postcard__body a:hover {
    background-color: #34495e;
    }



  </style>
</head>
<body>
  <section class="postcard">
    <div class="postcard__header">
      <i class="fa-solid fa-circle-check fa-2xl fa-beat" style="--fa-animation-duration: 5s;"></i>
      <h1>Payment Success!</h1>
    </div>
    <div class="postcard__body">
      <p>If you're not redirected within 3 seconds click the button below...</p>
      <a href="/src/webclient/UserProfile.php">Close</a>
    </div>
  </section>
</body>
</html>