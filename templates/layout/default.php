<?php
$logged_in=false;
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <?= $this->Flash->render() ?> <!--linea añadida -->

    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('https://github.com/benjaminmurguia/bookmarker') ?>"><span>Github-UPDS</span>Project</a>
        </div>
        <div class="top-nav-links">
            <a target="_blank" rel="noopener" href="http://localhost:8765/bookmarks">Bookmarks</a>
            <a target="_blank" rel="noopener" href="http://localhost:8765/users">Users</a>
            <a target="_blank" rel="noopener" href="http://localhost:8765/tags">Tags</a>
            <?php
    // Verificar si el usuario está logueado
    if($logged_in) {
        // El usuario está logueado, no imprimir el enlace de cierre de sesión
    } else {
        // El usuario no está logueado, imprimir el enlace de cierre de sesión
        echo '<a href="http://localhost:8765/users/logout" style="text-decoration: none; color: #333; background-color: #f0f0f0; padding: 10px; border-radius: 5px;">Cerrar sesión</a>';
    }
    ?>

        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
