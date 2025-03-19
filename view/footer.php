 <?php

    class viewFooter {

        public function displayView() {
            ob_start();
    ?>
         </main>
         <footer>

         </footer>
         </body>

         </html>
 <?php
            return ob_get_clean();
        }
    }
