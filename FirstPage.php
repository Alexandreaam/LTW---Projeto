<section id="buttons">
    <button onclick="reg()" id="regbot">Registar</button>
    <button onclick="log()" id="logbot">Login</button>
</section>
<nav id="blocos">
    <ul id="registo">
        <h1>Register</h1>
        <form id="regform" action="Registo.php" method="POST">
            <li><label>E-mail <input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="required"></label></li>
            <li><label>Username <input type="text" name="username" required="required"></label></li>
            <li><label>Password <input type="password" name="password" required="required"></label></li>
            <li><label>Date of birth <input type="date" name="date" required="required"></label></li>
            <input type="submit">
        </form>
    </ul>
    <ul id="login">
        <h1>Login</h1>
        <form id="logform" action="Login.php" method="POST">
            <li><label>Username <input type="text" name="username" required="required"></label></li>
            <li><label>Password <input type="password" name="password" required="required"></label></li>
            <input type="submit">
        </form>
    </ul>
</nav>

