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
        padding-left: 15px;
        display: flex;
        flex-direction: column;
    }

    #top{
        display: flex;
        flex-direction: row;
        padding-top: 42px;
        padding-left: 3px;
    }


    #user{
        width: 50px;
        height: 50px;
        padding-right: 3px;
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
        padding-left: 31px;
    }

    #logout{
        width: 15px;
        height:15px;
        padding-right: 3px;
        padding-top: 11px;
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
        }

        #bottom
        {
            margin-top: -3px;
        }

        #user
        {
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
            padding-left: 5px;
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
            padding-top: 10px;
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
            <p id="username">User-93400</p>
        </div>
        <div id="bottom">
            <img id="logout" src="/camagru/public/pictures/logout.png" alt="Déconnexion">
            <p id="deconnex">Se déconnecter</p>
        </div>
    </div>
    <div id="logoDiv">
        <a href="/camagru/view/home.php"><img id="logo" src="/camagru/public/pictures/Camagru.png" alt="logo"></a>
    </div>
</header>