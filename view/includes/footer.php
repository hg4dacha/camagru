<style>

    footer{
        position: absolute;
        bottom: 0px;
        left: 0px;
        width: 75%;
        height: 50px;
        margin-left: 225px;
    }

    #rights{
        color: rgb(142,142,142);
        font-size: 14px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        padding-left: 25px;
    }

    @media all and (max-width: 950px)
    {
        footer
        {
            margin-left: 165px;
            height: 45px;
        }
        
        #rights
        {
            padding-left: 30px;
            font-size: 12px;
        }
    }

    @media all and (max-width: 600px)
    {
        footer
        {
            margin-left: 63px;
            height: 32px;
        }

        #rights
        {
            font-size: 10px;
            padding-left: 22px;
        }
    }


</style>


<footer>
    <p id="rights">© <?= date('Y'); ?> CAMAGRU BY HG4DACHA</p>
</footer>