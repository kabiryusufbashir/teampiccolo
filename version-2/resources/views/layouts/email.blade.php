<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    </head>      
    <body style="background-color:#fff; font-family: 'Montserrat', sans-serif; width:75%; margin:2% auto; line-height:1.5;">
        <div style="margin-bottom: 2%; background-color:#fff; width:94%; float:left; font-size: 1.2rem; border:1px solid #eee; box-shadow:0px 2px 0px rgba(0, 0, 0, 0.4);">
            <div style="background-color:blue; color:white; padding: 2% 2%;">
                @yield('header')
            </div>
        <div style="padding: 1% 2%;">
                @yield('body')
        </div>
        </div>
        <div style="font-size: 90%; text-align:center; line-height:1.5; width:100%; float:left;">
            This system email was sent by Team Piccolo<br>
            Team Piccolo, No 7 Kabiru Alhaji Bashir Street Farawa Layout Off Maiduguri Road, Kano <br>
             <br>
            <a href="https://teampiccolo.com/" target="_blank"><img src="https://teampiccolo.com/images/logo.png" alt="Logo" style="width:25px;"></a>
            <a href="https://web.facebook.com/Teampiccolo/" target="_blank"><img src="https://i.pinimg.com/736x/ac/57/3b/ac573b439cde3dec8ca1c6739ae7f628.jpg" alt="" style="width:25px;"></a>
            <a href="https://github.com/kabiryusufbashir/" target="_blank"><img src="https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png" alt="" style="width:25px;"></a>
            <a href="https://twitter.com/kabiryusufbash/" target="_blank"><img src="https://www.creativefreedom.co.uk/wp-content/uploads/2017/06/Twitter-featured.png" alt="" style="width:25px;"></a>
        </div>
    </body>
</html>
