<?php if ($this->Paginator->hasPrev() or $this->Paginator->hasNext()): ?>	
    <div class="">
        <ul class="pagination pull-right">
            <li <?= !$this->Paginator->hasPrev()?'class="disabled"':'' ?>><?= $this->Paginator->prev('&laquo;', array('escape' => false), null, array('tag' => 'a', 'escape' => false)) ?></li>
            <?= $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')) ?>
            <li <?= !$this->Paginator->hasNext()?'class="disabled"':'' ?>><?= $this->Paginator->next('&raquo;', array('escape' => false), null, array('class' => 'disabled', 'tag' => 'a', 'escape' => false)) ?></li>

        </ul>
    </div>
<?php endif; ?>