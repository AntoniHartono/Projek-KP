<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <?php
                echo '<span style="padding-right: 8px;">' . $this->Html->image($this->Session->read('Auth.User.filedir') . $this->Session->read('Auth.User.filename'), array('width'=>20, 'class'=>'mini-pp')) . '</span>';
                echo '<span>' . $this->Session->read('Auth.User.name') . '</span>';
                ?>
                <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?php echo $this->Html->link('<i class="fa fa-pencil"></i> Ubah Profil', array('controller'=>'users', 'action'=>'edit'), array('escape'=>false)) ?></li>
                <li><?php echo $this->Html->link('<i class="fa fa-unlock-alt"></i> Ubah Password', array('controller'=>'users', 'action'=>'chpasswd'), array('escape'=>false)) ?></li>
                <li role="separator" class="divider"></li>
                <li><?php echo $this->Html->link('<i class="fa fa-sign-out"></i> Logout', array('controller'=>'users', 'action'=>'logout'), array('escape'=>false)) ?></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
</nav>
