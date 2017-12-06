<section id="buttons">
    <button onclick="reg()" id="regbot">Registar</button>
    <button onclick="log()" id="logbot">Login</button>
</section>
<nav id="blocos">
    <form id="regform" action="Registo.php" method="POST">
        <ul id="registo">
            <li><label id="titleres">Register</label></li>
                <li><label>E-mail <input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="required"></label></li>
                <li><label>Username <input type="text" name="username" required="required"></label></li>
                <li><label>Password <input type="password" name="password" required="required"></label></li>
                <li><label>Date of birth <input type="date" name="date" required="required"></label></li>
            <li><input type="submit"></li>
        </ul>
    </form>
    <form id="logform" action="Login.php" method="POST">
        <ul id="login">
            <li><label id="titlelog">Login</label></li>
            <li><label>Username <input type="text" name="username" required="required"></label></li>
            <li><label>Password <input type="password" name="password" required="required"></label></li>
            <li><input type="submit"></li>
        </ul>
    </form>
</nav>

