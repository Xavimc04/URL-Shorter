<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>URL | Shorter</title> 
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>

    <body>
        <div class="middle">
            <div class="header">
                <div class="theme" onclick="handleTheme()">Handle theme</div>

                <h1><span class="material-icons">qr_code_scanner</span> Free<span>Shorter</span></h1>

                <div>
                    Simple URL shorter maded with <strong>Laravel</strong>, usage: 
                    <ul>
                        <li><span>1.</span> Introduce your URL</li>
                        <li><span>2.</span> Wait the response from server</li>
                        <li><span>3.</span> Copy to clipboard and you can use!</li>
                    </ul>
                </div>
            </div>

            <div class="container">
                @if (Session::has('error'))    
                    <div class="error">
                        {{ Session::get('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf 

                    <input type="text" name="url" placeholder="Introduce URL...">
                    <input type="submit" value="Reduce">
                </form>

                @if (Session::has('success'))        
                    <div class="success">
                        <div class="url">{{ Session::get('success') }}</div>
                        <button onclick="copyURL()" class="copy">Copy URL<span class="material-icons">content_copy</span></button>
                    </div>
                @endif
            </div>

            <footer class="footer">
                <p>
                    Maded with <span class="material-icons">favorite</span> from XaviMC04, <a target="_blank" href="https://github.com/Xavimc04">Github<span class="material-icons">public</span></a>
                </p>
            </footer>
        </div>
    </body>

    <script>
        addEventListener('DOMContentLoaded', (event) => { 
            if(localStorage.getItem('theme') == null) {
                localStorage.setItem('theme', 'light'); 
            }

            document.querySelector('body').setAttribute('data-theme', localStorage.getItem('theme')); 
        })

        const handleTheme = () => { 
            if(localStorage.getItem('theme') == 'light') {
                localStorage.setItem('theme', 'dark'); 
            } else {
                localStorage.setItem('theme', 'light'); 
            }

            document.querySelector('body').setAttribute('data-theme', localStorage.getItem('theme')); 
        }

        const copyURL = () => {
            const content = document.querySelector('.url').textContent

            if(content.length > 0) {
                navigator.clipboard.writeText(content);
            }
        }
    </script>

    <style>
        * {
            font-family: 'Nunito', sans-serif; 
            user-select: none;
            transition: all .4s;  
        }

        body {
            padding: 0; 
            margin: 0; 
            width: 100%; 
            height: 100%; 
            background: var(--bg-color); 
            color: var(--main-color); 
            transition: all .5s; 
            overflow-x: hidden; 
        }

        body, body[data-theme="light"] {
            --bg-color: white;  
            --main-color: black; 
            --input-bg: whitesmoke; 
            --input-color: gray; 
        }

        body[data-theme="dark"] {
            --bg-color: #1a1a1a;  
            --main-color: whitesmoke;
            --input-bg: rgb(84, 84, 84);
            --input-color: white; 
        }

        .header {
            margin-top: 20px; 
        }

        .header .theme {
            text-align: end; 
            transition: .4s; 
            padding-bottom: 20px; 
        }

        .header .theme:hover {
            color: rgb(224, 88, 88); 
            transition: .4s; 
        }

        .header h1 {
            color: var(--main-color); 
            display: flex; 
            align-items: center;  
        }

        .header h1 span {
            color: rgb(224, 88, 88); 
            font-weight: 900; 
        }

        .header h1 span:first-child {
            margin-right: 20px;
            font-size: 2rem; 
        }

        .header div ul {
            all: unset; 
            list-style: none;   
        }

        .header div ul li {
            margin-top: 25px; 
            color: var(--main-color); 
        }

        .header div ul li span {
            color: rgb(224, 88, 88); 
        }

        .middle {
            position: absolute;  
            left: 50%; 
            transform: translate(-50%); 
            width: 450px;  
            height: 100vh; 
            display: flex; 
            flex-direction: column;  
        } 

        .container {
            position: absolute; 
            top: 50%; 
            left: 50%; 
            transform: translate(-50%, -50%);  
        }

        form {
            margin-top: 10px; 
            display: flex; 
            flex-direction: column; 
            width: 350px; 
        }

        form input {
            width: 100%; 
        }

        form input:focus {
            outline: none; 
        }

        form input:not(:first-child) {
            margin-top: 15px; 
        }

        form input[type="text"] { 
            border: none; 
            border-radius: 3px; 
            background: var(--input-bg);
            color: var(--input-color); 
            padding: 10px 0px; 
            font-size: 1.02rem; 
            text-align: center; 
        }

        form input[type="submit"] {
            width: 100%; 
            border: none; 
            background: rgb(224, 88, 88); 
            border-radius: 3px; 
            font-size: 1.02rem; 
            padding: 10px 0px; 
            color: whitesmoke; 
            transition: all .5s;
        }

        form input[type="submit"]:hover {
            background: rgb(224, 88, 88); 
            box-shadow: 0px 0px 5px rgb(224, 88, 88);
            transition: all .5s; 
            color: white; 
        }

        .error {
            width: 100%;  
            color: rgb(224, 88, 88); 
            text-align: center;
        }

        .success {
            width: 100%;  
            margin-top: 20px;  
        }

        .success .url {
            color: rgb(94, 226, 68); 
            text-align: center;
        }

        .copy {
            width: 100%; 
            border: none; 
            border-radius: 3px; 
            font-size: 1.02rem; 
            padding: 10px 0px;  
            margin-top: 15px; 
            display: flex; 
            justify-content: center; 
            background: var(--input-bg);
            color: var(--input-color); 
            transition: all .5s; 
        }

        .copy:hover {
            background: rgb(224, 88, 88); 
            box-shadow: 0px 0px 5px rgb(224, 88, 88);
            transition: all .5s; 
            color: white; 
        }

        .copy span {
            font-size: 1.3rem; 
            margin-left: 10px; 
        }

        .footer {
            position: absolute;  
            left: 50%; 
            transform: translate(-50%);
            bottom: 10px; 
            color: var(--main-color);   
            display: flex; 
            justify-content: center; 
            opacity: .7;
            width: 100%; 
            font-size: 1.1rem; 
        }

        .footer p {
            display: flex; 
            justify-content: center;
        }

        .footer a {
            all: unset;
            margin-left: 10px; 
            color: rgb(224, 88, 88); 
            display: flex; 
            justify-content: center; 
            font-weight: 900
        }

        .footer span {
            margin: 0px 10px; 
        }
    </style>
</html>
