<style>
    .logo-container {
        display: flex;
        align-items: center;
        /*background: rgba(255, 255, 255, 0.9); !* Slightly transparent background *!*/
        padding: 11px 22px;
        border-radius: 10px; /* Rounded corners */
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3); /* Shadow effect */
    }

    .logo {
        font-family: 'Montserrat', sans-serif;
        font-weight: bold;
        color: rgba(60, 91, 126, 0.75); /* Darker shade of light blue */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Slight shadow */
        letter-spacing: 1px;
        font-size: 2em; /* Adjust as needed */
        margin-left: 10px; /* Space between icon and text */
    }

    .icon {
        width: 2.5em; /* Icon size */
        height: 2.5em; /* Icon size */
        fill: rgba(60, 91, 126, 0.75); /* Same color as logo text */
        margin-right: 10px; /* Space between icon and text */
    }
</style>
<header id="header" id="home">
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
            <a href="/home">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M10 2a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zm0 2a6 6 0 0 0-6 6 6 6 0 0 0 6 6 6 6 0 0 0 6-6 6 6 0 0 0-6-6zm12.707 17.293l-3.75-3.75a8 8 0 0 0 1.543-4.793 8 8 0 0 0-8-8 8 8 0 0 0-8 8 8 8 0 0 0 8 8 8 8 0 0 0 4.793-1.543l3.75 3.75a1 1 0 0 0 1.414-1.414z"/>
                </svg>
                <div class="logo">JobSearch</div>
            </a>
            @include('partials.components.nav')
        </div>
    </div>
</header>
