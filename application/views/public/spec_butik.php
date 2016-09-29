<section style="" class="section testimonails">
  <div class="container">
    <h1 class="heading">Butiker som börjar på <span class="accent"><?php echo $letter; ?></span> </h1>

    <div class="row">
      <div class="col-md-12" >

          <?php


            foreach ($query->result() as $butik )
            {
                echo '<a href="' .base_url('rabattkod/' .$butik->slug. ''). '" style="font-size: 20px; padding-right: 20px;">';
                echo $butik->namn;
                echo '</a>';
            }



           ?>

   </div>
    </div><hr>
    <div class="row">
        <div class="col-md-12">
            <p class="text-center" style="font-size: 20px; word-spacing: 12px;">

            <a href="<?php echo base_url('butiker/a');?>">A</a>
            <a href="<?php echo base_url('butiker/b');?>">B</a>
            <a href="<?php echo base_url('butiker/c');?>">C</a>
            <a href="<?php echo base_url('butiker/d');?>">D</a>
            <a href="<?php echo base_url('butiker/e');?>">E</a>
            <a href="<?php echo base_url('butiker/f');?>">F</a>
            <a href="<?php echo base_url('butiker/g');?>">G</a>
            <a href="<?php echo base_url('butiker/h');?>">H</a>
            <a href="<?php echo base_url('butiker/i');?>">I</a>
            <a href="<?php echo base_url('butiker/j');?>">J</a>
            <a href="<?php echo base_url('butiker/k');?>">K</a>
            <a href="<?php echo base_url('butiker/l');?>">L</a>
            <a href="<?php echo base_url('butiker/m');?>">M</a>
            <a href="<?php echo base_url('butiker/n');?>">N</a>
            <a href="<?php echo base_url('butiker/o');?>">O</a>
            <a href="<?php echo base_url('butiker/p');?>">P</a>
            <a href="<?php echo base_url('butiker/q');?>">Q</a>
            <a href="<?php echo base_url('butiker/r');?>">R</a>
            <a href="<?php echo base_url('butiker/s');?>">S</a>
            <a href="<?php echo base_url('butiker/t');?>">T</a>
            <a href="<?php echo base_url('butiker/u');?>">U</a>
            <a href="<?php echo base_url('butiker/v');?>">V</a>
            <a href="<?php echo base_url('butiker/w');?>">W</a>
            <a href="<?php echo base_url('butiker/x');?>">X</a>
            <a href="<?php echo base_url('butiker/y');?>">Y</a>
            <a href="<?php echo base_url('butiker/z');?>">Z</a>
            <a href="<?php echo base_url('butiker/å');?>">Å</a>
            <a href="<?php echo base_url('butiker/ä');?>">Ä</a>
            <a href="<?php echo base_url('butiker/ö');?>">Ö</a>
            </p>
        </div>
    </div>
  </div>
</section>
