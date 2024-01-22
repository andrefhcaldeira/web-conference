
<footer>
    <div class="footer-info">
        <img src="./images/ExploraSci.png" alt="logo" width="250px" height="60">
        <span>ExploraSci <br>
        <?php
                $contentId = 2;
                $contentText = getContentById($contentId, $db);
                echo $contentText ;
                ?><br>
        +351 21 234 5678 explorasci@gmail.com</span>
    </div>
    <div class="copyright">
        <span>Copyright &copy 2024 ExploraSci. All rights reserved. Privacy Policy | Terms and Conditions. Designed by ExploraSci. </span>
    </div>
</footer>
</body>
</html>