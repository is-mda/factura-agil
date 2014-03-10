<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <?php echo $this->Html->link('Factura Agil', 
                    '/', 
                    array('title' => __('home'), 'class' => 'navbar-brand', 'escape' => false)); ?>
        </div> <!-- /.navbar-header -->       
        <?php if(AuthComponent::user('id')): ?>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">                
                <li <?php echo $this->params['controller'] == 'invoices' ? 'class="active"' : '' ?>>
                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-folder-close"></span> ' . __('Invoices'), 
                            '#', 
                            array('title' => __('invoices management'), 'escape' => false)); ?>
                </li>
                <li <?php echo $this->params['controller'] == 'companies' ? 'class="active"' : '' ?>>
                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-home"></span> ' . __('Companies'), 
                            '#', 
                            array('title' => __('companies management'), 'escape' => false)); ?>
                </li>
                <li <?php echo $this->params['controller'] == 'clients' ? 'class="active"' : '' ?>>
                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-bookmark"></span> ' . __('Clients'),
                        array('controller' => 'clients', 'action' => 'index'),
                        array('title' => __('clients management'), 'escape' => false)); ?>
                </li>
            </ul>
            <div class="navbar-right">
                <p class="navbar-text"><span class="glyphicon glyphicon-user"></span> <?php echo AuthComponent::user('name') ?></p>
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-log-out"></span> ' . __('Sign out'), '/sign_out', array('title' => __('Sign out'), 'class' => 'btn btn-default navbar-btn btn-sm', 'escape' => false)); ?>                    
            </div>                
        </div> <!-- /.navbar-collapse -->     
        <?php else: ?>
        <div class="navbar-right">
            <div class="btn-group">                
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span> ' . __('Sign up'), '/sign_up', array('title' => __('Sign up'), 'class' => 'btn btn-info navbar-btn btn-sm', 'escape' => false)); ?>
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-log-in"></span> ' . __('Sign in'), '/sign_in', array('title' => __('Sign in'), 'class' => 'btn btn-info navbar-btn btn-sm', 'escape' => false)); ?>           
            </div>
            
        </div>
        <?php endif ?>
    </div> <!-- /.container -->
</nav>