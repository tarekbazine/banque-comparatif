<!doctype html>
<html lang="fr">
<head>
    <title>PAGE ADMINISTRATION</title>
    <link href="/front/css/bootstrap.css" rel="stylesheet" type="text/css">
    <style>
        /* Bordered form */
        form {
            margin-top: 10%;
            border: 3px solid #f1f1f1;
        }

        /* Full-width inputs */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Set a style for all buttons */
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        /* Add a hover effect for buttons */
        button:hover {
            opacity: 0.8;
        }

        /* Extra style for the cancel button (red) */
        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        /* Center the avatar image inside this container */
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        /* Avatar image */
        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
        }

        /* The "Forgot password" text */
        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="offset-md-3 col-md-6">
            <form action="/administrateur/auth" method="post">
                <div class="imgcontainer">
                    <img src="img_avatar2.png" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <label><b>Le nom utilisateur</b></label>
                    <input type="text" placeholder="Enter le nom utilisateur" name="nom" required>

                    <label><b>Le mot de pass</b></label>
                    <input type="password" placeholder="Enter le mot de pass" name="mdp" required>

                    <button type="submit">Login</button>
<!--                    <label>-->
<!--                        <input type="checkbox" checked="checked"> Remember me-->
<!--                    </label>-->
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="reset" class="cancelbtn">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>