<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

   <link rel="stylesheet" href="../../assets/public/css/style.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
   <title>Tela de Login</title>
</head>

<body>

   <div class="container-fluid">
      <!--logo section -->

      <div class="row vh-100">

         <div class="cold-md-6 d-flex align-items-center justify-content-center bg-dark-blue">



            <img src="../../assets/public/images/Imagem do WhatsApp de 2024-08-25 à(s) 20.58.27_05cf9d16.jpg" alt="Logo Time Library" class="logo">
         </div>

         <!-- Login Formulario section -->
         <div class="col-md-6 d-flex align-items-center justify-content-center">

            <div class="login-form-container p-5">

               <form action="../../services/login.php" method="POST">
                  <h1> Bem Vindo </h1>
                  <div>
                     <label for="email">Email:</label>
                     
                     <input placeholder="Digite seu Email" type="text" name="email" required>
                    
                     
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                     </svg>
                     <i class="bi bi-person-fill"></i>
                    
                  </div>

                  <div>

                     <label for="email">Senha:</label>
                     <input type="password" placeholder="Digite sua Senha" name="senha" required>

                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.8 11.8 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7 7 0 0 0 1.048-.625 11.8 11.8 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.54 1.54 0 0 0-1.044-1.263 63 63 0 0 0-2.887-.87C9.843.266 8.69 0 8 0m0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5" />
                     </svg>
                     <i class="bi bi-shield-lock-fill"></i>

                     <div class="form-group">

                        <a href="#"> Esqueci minha senha </a>

                     </div>

                  </div>
                  <button type="submit" class="btn btn-outline-primary btn-block"> Logar-se </button>

                  <div>
                     <div class="mt-3">
                        <p> Nao Está cadastrado? <a href="#"> cadastrar </a> </p>
                     </div>


                  </div>
            </div>
         </div>
         </form>
</body>

</html>