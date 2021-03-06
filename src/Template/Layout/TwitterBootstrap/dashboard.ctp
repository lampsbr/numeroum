<?php
/* @var $this \Cake\View\View */
use Cake\Core\Configure;

$this->Html->css('BootstrapUI.dashboard', ['block' => true]);
$this->prepend('tb_body_attrs', ' class="' . implode(' ', [$this->request->getParam('controller'), $this->request->getParam('action')]) . '" ');
$this->start('tb_body_start');
?>
<body <?= $this->fetch('tb_body_attrs') ?>>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?= $this->Html->link('Número UM', ['controller' => 'clientes', 'action' => 'index'], ['class' => 'navbar-brand']) ?>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right visible-xs">
                    <?= $this->fetch('tb_actions') ?>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-divider"></li>
                    
		<?php if (isset($_SESSION['Auth']['User']['email'])): ?>
                        <li>
                            <div style="line-height: 2.8125rem;padding: 0 0.9375rem; color: #9d9d9d">
                                <?=$_SESSION['Auth']['User']['email']?>
                                <?= $this->Html->link(__('(sair)'), ['controller' => 'users', 'action' => 'logout']) ?>
                            </div>
                        </li>
                    <?php endif; ?>                
		</ul>
                <!--<form class="navbar-form navbar-right">
                    <input type="text" class="form-control" placeholder="Search...">
                </form>
                -->
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
        <?php if($this->fetch('tb_sidebar')){ ?>
            <div class="col-sm-3 col-md-2 sidebar">
                <?= $this->fetch('tb_sidebar') ?>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header"><?= $this->request->controller; ?></h1>
        <?php } else{ ?>
            <div class="col-sm-12 main">
                <h1 class="page-header"><?= $this->fetch('titulo') ?></h1>
        <?php } ?>
<?php
/**
 * Default `flash` block.
 */
if (!$this->fetch('tb_flash')) {
    $this->start('tb_flash');
    if (isset($this->Flash)) {
        echo $this->Flash->render();
    }
    $this->end();
}
$this->end();

$this->start('tb_body_end');
echo '</body>';
$this->end();

$this->append('content', '</div></div></div>');
echo $this->fetch('content');
