<div>
    <div class="md:container mx-auto">
        <form action="../Controller/login.php" method="post">
            <h1>Logar-se</h1>
            <?php
                if(isset($_GET['error'])){
                    echo "<p class='text-red-500'>Seu e-mail e/ou senha estão incorretas, tente novamente</p>";
                }
            ?>
            <label class="font-medium">Correio Eletrônico:</label><br>
            <input type="email" required class="rounded" placeholder="João@gmail.com" name="user_email"><br>
            <label class="font-medium">Senha:</label><br>
            <input type="password" required class="rounded" name="user_pass" placeholder="*****" id=""><br>
            <input type="submit" class="w-28 rounded h-6 m-1 bg-red-500 cursor-pointer ml-7 hover:bg-red-400 text-white" value="Entrar">
        </form>
    </div>
</div>
