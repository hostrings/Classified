<?php foreach ($dados as $dado): ?>
  <aside>
    <?php 
    $this->load->model("carroshome");
    $fotos = ($this->carroshome->puxaThumb($dado['id'])) ? $this->carroshome->puxaThumb($dado['id']) : $this->carroshome->semimagem($dado['id']);

    ?>
    <a href="<?= base_url("car/$dado[id]-".str_replace(" ","-",removehtml($dado['modelo']))) ?>" style="padding: 0 !important; margin: 0 !important; border:none !important;background: transparent !important;" alt='<?= html_escape($dado['modelo']) ?>' title='<?= html_escape($dado['modelo']) ?>'>

      <div class="col s12 m4 l3 carrosRetangulo ">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card z-depth-0" style='padding:3px;border:solid 1px #e0e0e0;border-bottom:solid 4px #e0e0e0'>
              <div class="card-image">
                <img style='height: 190px' class="carrosFotominiCard" src="<?= base_url($fotos['caminho']."thumb/".$fotos['thumb']) ?>">
                <span class="card-title" style='font-size: 0.8em !important;text-transform: uppercase;'><?= html_escape(substr($dado['modelo'],0,18)) ?></span>
              </div>
              <div class="card-content">
                <ul class="itensCarroFront">
                  <li style='color: #212121'><span class='bold'>Model : <?= html_escape(substr($dado['modelo'],0,10))?></span></li>
                  <li style='color: #424242'>Year      : <?= html_escape(substr($dado['year'],0,15)) ?></li>
                  <li style='color: #424242'>Miles     : <?= html_escape(substr($dado['odometer'],0,7)) ?></li>
                  <li style='color: #424242'>Fuel      : <?= html_escape(substr($dado['fuel'],0,15)) ?></li>
                  <li style='color: #424242'>Transm : <?= html_escape($dado['transmission']) ?></li>
                  <li style='color: #424242'>City     : <?= ($dado['city']) ? html_escape(substr($dado['city'],0,15)) : html_escape(substr($dado['stateAuto'],0,15))?></li>
                  <li style='font-size: 0.8em;border-bottom:3px solid #b71c1c' class='priceN'>Price  : <?= numeroEmReais($dado['price']) ?></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </aside>

<?php endforeach; ?>
<div class="paginacao row">
  <ul class="pagination col s12 m12 l12">
    <?php  echo $this->pagination->create_links(); ?>
  </ul>
</div>
</div>
