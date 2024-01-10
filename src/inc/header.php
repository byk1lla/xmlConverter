<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>ConvertXmlToSQL</title>
    <link rel="stylesheet" href="./src/assets/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.31/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&amp;display=swap" rel="stylesheet">
    <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script> -->
    
<style>
  html {
    scroll-behavior: smooth;
  }
  body{
    font-family: 'Poppins', sans-serif;
  }
</style>


<body class="text-white bg-gray-900 flex flex-col h-screen max-h-screen min-h-screen overflow-auto">
<nav class="sticky top-0 z-50 bg-gray-800 text-white shadow-md transition-all delay-5 ea">
    <div class="container mx-auto p-4 ">
        <div class="flex justify-between items-center">
            <a href="/home" class="text-2xl font-semibold flex items-center space-x-2">
                <i class="fa-solid fa-code text-yellow-500"></i>
                <span>ConvertXmlToSQL</span>
            </a>
            
            <button class="md:hidden" id="mobile-menu-button">
                <i class="fas fa-bars text-xl"></i>
            </button>
            <ul class="hidden md:flex space-x-4">
                <!-- Desktop Menu Items (hidden on mobile) -->
                <li>
                    <a href="./home" class="flex items-center space-x-2 hover:font-semibold hover:text-yellow-500 transition-all duration-300 ease-in-out">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                
                <li>
                    <a href="./convert" class="hover:font-semibold hover:text-yellow-500 transition-all duration-300 ease-in-out">
                        <i class="fa-solid fa-rotate"></i> Convert
                    </a>
                </li>
                 

            </ul>
        </div>
        
        <div class="md:hidden pt-4" id="mobile-menu">
            <ul class="flex flex-col space-y-4">
               
                <li>
                    <a href="./home" class="hover:font-semibold hover:text-yellow-500 transition-all duration-300 ease-in-out">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                
                                <li>
                    <a href="./convert" class="hover:font-semibold hover:text-yellow-500 transition-all duration-300 ease-in-out">
                    <i class="fa-solid fa-rotate"></i> Convert
                    </a>
                </li>
                 
            </ul>
        </div>
    </div>
</nav>

<script>
    const mobileMenuButton = document.getElementById("mobile-menu-button");
    const mobileMenu = document.getElementById("mobile-menu");
    mobileMenu.classList.toggle("hidden");
    mobileMenuButton.addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");
    });
</script>