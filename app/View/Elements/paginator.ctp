<p>
    <?php
    echo $this->Paginator->counter(array(
        'format' => __('Pagina {:page} de {:pages}, mostrando {:current} registros de un total de {:count}, el primer registro es el {:start} y el último es el {:end}')
    ));
    ?>
</p>

<div class="paging">
    <?php
    echo $this->Paginator->first('<< ', array('class' => 'first'));
    echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
    echo $this->Paginator->numbers(array('separator' => ''));
    echo $this->Paginator->next(__('siguiente') . ' >', array(), null, array('class' => 'next disabled'));
    echo $this->Paginator->last(' >>', array('class' => 'last'));
    ?>
</div>