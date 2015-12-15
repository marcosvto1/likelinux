<nav class="navbar navbar-light bg-faded " id="menu-box" style="">
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
        &#9776;
    </button>
    <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
        <a class="navbar-brand" style="  color: rgba(84, 227, 181, 0.85)">Links</a>
        <!-- #82d191
        background-color: #26519C;
     border-top: 3px solid #64E46A;

     background-color: #00a4a5;

        -->
        <ul class="nav navbar-nav">
            <li class="nav-item" >
                <a class="nav-link" id="link_menu" href="#">Global Posts</a>
            </li>
        </ul>

        <form class="form-inline navbar-form pull-left ">
            &nbsp;&nbsp; <input class="form-control" type="search" name="query" placeholder="Buscar Post">
            <button class="btn btn-success-outline" type="submit">Buscar</button>
        </form>

      <!--  <form class="form-inline navbar-form pull-right" style="" action="/logout">
            <button class="btn btn-warning-outline" type="submit">Sair</button>
        </form> -->

        <ul class="nav navbar-nav">

            <li class="nav-item dropdown pull-right">
                <a href="#" class="btn btn-warning-outline dropdown-toggle" id="link_menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i>
                    Minha Conta <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li> <a class="dropdown-item" href="/editar/perfil">Configuraçoes de Conta</a></li>
                    <li> <a class="dropdown-item" href="/logout">Sair</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
