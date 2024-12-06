About the E-Commerce Store
--------------------------

Welcome to the **Clothes E-Commerce Store** repository! This project is a full-featured online store built to provide a seamless shopping experience for customers and a robust administrative interface for store managers.

### Tech Stack

*   **Backend:** [Laravel](https://laravel.com) – A powerful PHP framework for building web applications.
    
*   **Frontend (Admin Panel):** [Nuxt 3](https://nuxt.com) – A progressive Vue.js framework for creating intuitive and performant user interfaces.
    

The repository is structured with the Laravel backend in the root directory, handling all server-side operations, and the Nuxt 3 frontend for the admin panel located in the Admin folder.

Prerequisites
-------------

Before setting up the project, ensure you have the following installed on your machine:

*   **PHP (>=8.0)** with necessary extensions[Laravel Server Requirements](https://laravel.com/docs/10.x/deployment#server-requirements)
    
*   **Composer** – Dependency management for PHPDownload Composer
    
*   **Node.js (>=16.0)** and **npm** – JavaScript runtime and package managerDownload Node.js
    
*   **MySQL or MariaDB** – Database management system[Laravel Database Configuration](https://laravel.com/docs/10.x/database)
    
*   **Git** – Version control system[Git Documentation](https://git-scm.com/doc)
    

Getting Started
---------------

Follow these steps to set up the project locally.

### 1\. Clone the Repository

Plain textANTLR4BashCC#CSSCoffeeScriptCMakeDartDjangoDockerEJSErlangGitGoGraphQLGroovyHTMLJavaJavaScriptJSONJSXKotlinLaTeXLessLuaMakefileMarkdownMATLABMarkupObjective-CPerlPHPPowerShell.propertiesProtocol BuffersPythonRRubySass (Sass)Sass (Scss)SchemeSQLShellSwiftSVGTSXTypeScriptWebAssemblyYAMLXML`   bashCopy codegit clone https://github.com/Abdalrahman8/ecommerce.git   `

### 2\. Set Up the Backend (Laravel)

1.  bashCopy codecd ecommerce
    
2.  bashCopy codecomposer install
    
3.  bashCopy codecp .env.example .env[_Laravel Configuration Docs_](https://laravel.com/docs/10.x/configuration)
    
    *   Open the .env file and update the following variables:
        
        *   APP\_URL (e.g., http://localhost:8000)
            
        *   DB\_DATABASE, DB\_USERNAME, DB\_PASSWORD with your database credentials
            
4.  bashCopy codephp artisan key:generate
    
5.  bashCopy codephp artisan migrate --seed
    
6.  bashCopy codephp artisan serveThe backend will be accessible at http://localhost:8000.
    

### 3\. Set Up the Admin Panel (Nuxt 3)

1.  bashCopy codecd Admin
    
2.  bashCopy codenpm install
    
3.  **Configure Environment Variables:**
    
    *   bashCopy codecp .env.example .env
        
    *   Update the .env file with necessary variables, such as API endpoints pointing to the Laravel backend.
        
4.  bashCopy codenpm run devThe admin panel will be accessible at http://localhost:3000.
    

### 4\. Accessing the Applications

*   **Main Website (Laravel):** http://localhost:8000
    
*   **Admin Panel (Nuxt 3):** http://localhost:3000
    

Building for Production
-----------------------

To prepare the applications for a production environment, follow these steps:

### Backend (Laravel)

1.  **Configure Environment Variables:**
    
    *   Ensure all environment variables in .env are set appropriately for production.
        
2.  bashCopy codephp artisan config:cachephp artisan route:cachephp artisan view:cache
    
3.  **Set Up a Web Server:**
    
    *   Use a web server like **Nginx** or **Apache** to serve the Laravel application.
        
    *   [Laravel Deployment Documentation](https://laravel.com/docs/10.x/deployment)
        

### Admin Panel (Nuxt 3)

1.  bashCopy codenpm run build
    
2.  bashCopy codenpm run start
    
3.  **Set Up a Web Server:**
    
    *   Configure your web server to serve the built Nuxt application.
        
    *   Nuxt Deployment Documentation
        

Features
--------

*   **User Authentication:** Secure registration and login for customers.
    
*   **Product Management:** CRUD operations for products, categories, and inventory.
    
*   **Shopping Cart:** Users can add, remove, and manage items in their cart.
    
*   **Order Processing:** Streamlined checkout process with order tracking.
    
*   **Admin Dashboard:** Comprehensive admin panel for managing the store.
    
*   **Responsive Design:** Mobile-friendly interfaces for both frontend and admin panel.
    
*   **Payment Integration:** Support for multiple payment gateways.