<style>

    header{
        background-color: white;
        width: 100%;
        height: 140px;
        display: flex;
        flex-direction: row;
        box-shadow: 105px 1px 10px rgb(165, 165, 165);
        position: fixed;
    }

    #userDiv{
        text-align: left;
        width: 100%;
        padding-left: 21px;
        display: flex;
        flex-direction: column;
    }

    #initial{
        height: initial;
    }

    #top{
        display: flex;
        flex-direction: row;
        padding-top: 38px;
        padding-left: 9px;
        padding-bottom: 9px;
    }


    #user{
        width: 50px;
        height: 50px;
        padding-right: 3px;
        padding-top: 2px;
    }

    #username{
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        color: black;
        font-weight: bold;
        font-size: 20px;
    }

    #bottom{
        display: flex;
        flex-direction: row;
        padding-left: 25px;
    }

    #logout{
        width: 17px;
        height:17px;
        padding-right: 1px;
        padding-top: 9px;
        cursor: pointer;
    }

    #deconnex{
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-size: 12px;
        color: #EA2027;
        font-weight: bold;
        cursor: pointer;
    }

    #logoDiv{
        text-align: right;
    }

    #logo{
        width: 220px;
        margin-top: 53px;
        margin-right: 49px;
    }

    @media all and (max-width: 950px)
    {
        header
        {
            height: 105px;
        }

        #logo
        {
            width: 170px;
            margin-top: 37px;
            margin-right: 23px;
        }

        #top
        {
            padding-top: 12px;
            padding-bottom: 3px;
            padding-left: 10px;
        }

        #bottom
        {
            padding-left: 23px;
        }

        #logout
        {
            padding-top: 8px;
            width: 13px;
            height:13px;
        }

        #deconnex
        {
            font-size: 10px;
        }

        #user
        {
            padding-right: 5px;
            padding-top: 7px;
            width: 40px;
            height: 40px;
        }
    }

    @media all and (max-width: 600px)
    {
        header
        {
            height: 65px;
            box-shadow: 65px 0px 5px rgb(165, 165, 165);
        }

        #logo
        {
            width: 90px;
            margin-top: 0px;
            margin-right: 0px;
        }

        #logoDiv
        {
            display: flex;
            justify-content: flex-end;
            width: 100%;
            position: absolute;
            bottom: 0;
            right: 15px;
        }

        #userDiv
        {
            padding-left: 1px;
        }

        #top
        {
            padding-top: 5px;
            padding-left: 1px;
        }
        
        #user
        {
            width: 30px;
            height: 30px;
            padding-top: 3px;
            padding-right: 2px;
        }

        #username
        {
            font-size: 13px;
        }

        #bottom
        {
            padding-left: 0px;
            margin-top: -5px;
        }

        #logout
        {
            width: 10px;
            height: 10px;
            padding-top: 9px;
        }

        #deconnex
        {
            font-size: 9px;
        }
    }

</style>


<header>
    <div id="userDiv">
        <div id="top">
            <img id="user" src="/camagru/public/pictures/user.png" alt="Utilisateur">
            <p id="username"><?= $_SESSION['username']; ?></p>
        </div>
        <div id="bottom">
            <img id="logout" src="/camagru/public/pictures/logout.png" alt="Déconnexion">
            <a href="/camagru/view/includes/deconnexion.php"><p id="deconnex">Déconnexion</p></a>
        </div>
    </div>
    <div id="logoDiv">
        <a id="initial" href="/camagru/view/home.php"><img id="logo" src="/camagru/public/pictures/Camagru.png" alt="logo"></a>
    </div>
</header>