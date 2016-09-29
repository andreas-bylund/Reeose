<div class="breadcrumbs-v4">
	<div class="container">
		<h1>REA - Just nu!</h1>
	</div><!--/end container-->
</div>

<section>
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <p class="text-center" style="padding: 20px; border: dashed 1px #bbb;  margin: 40px 0px 40px 0px; vertical-align: middle; font-size: 20px; word-spacing: 12px;">
                <a rel="nofollow" href="<?php echo base_url('rea#A');?>">A</a>
                <a rel="nofollow" href="<?php echo base_url('rea#B');?>">B</a>
                <a rel="nofollow" href="<?php echo base_url('rea#C');?>">C</a>
                <a rel="nofollow" href="<?php echo base_url('rea#D');?>">D</a>
                <a rel="nofollow" href="<?php echo base_url('rea#E');?>">E</a>
                <a rel="nofollow" href="<?php echo base_url('rea#F');?>">F</a>
                <a rel="nofollow" href="<?php echo base_url('rea#G');?>">G</a>
                <a rel="nofollow" href="<?php echo base_url('rea#H');?>">H</a>
                <a rel="nofollow" href="<?php echo base_url('rea#I');?>">I</a>
                <a rel="nofollow" href="<?php echo base_url('rea#J');?>">J</a>
                <a rel="nofollow" href="<?php echo base_url('rea#K');?>">K</a>
                <a rel="nofollow" href="<?php echo base_url('rea#L');?>">L</a>
                <a rel="nofollow" href="<?php echo base_url('rea#M');?>">M</a>
                <a rel="nofollow" href="<?php echo base_url('rea#N');?>">N</a>
                <a rel="nofollow" href="<?php echo base_url('rea#O');?>">O</a>
                <a rel="nofollow" href="<?php echo base_url('rea#P');?>">P</a>
                <a rel="nofollow" href="<?php echo base_url('rea#Q');?>">Q</a>
                <a rel="nofollow" href="<?php echo base_url('rea#R');?>">R</a>
                <a rel="nofollow" href="<?php echo base_url('rea#S');?>">S</a>
                <a rel="nofollow" href="<?php echo base_url('rea#T');?>">T</a>
                <a rel="nofollow" href="<?php echo base_url('rea#U');?>">U</a>
                <a rel="nofollow" href="<?php echo base_url('rea#V');?>">V</a>
                <a rel="nofollow" href="<?php echo base_url('rea#W');?>">W</a>
                <a rel="nofollow" href="<?php echo base_url('rea#X');?>">X</a>
                <a rel="nofollow" href="<?php echo base_url('rea#Y');?>">Y</a>
                <a rel="nofollow" href="<?php echo base_url('rea#Z');?>">Z</a>
                <a rel="nofollow" href="<?php echo base_url('rea#Å');?>">Å</a>
                <a rel="nofollow" href="<?php echo base_url('rea#Ä');?>">Ä</a>
                <a rel="nofollow" href="<?php echo base_url('rea#Ö');?>">Ö</a>
            </p>
        </div>
    </div>

    <?php



        $bokstav = 'A';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>


    <?php

        $bokstav = 'B';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'C';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'D';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'E';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'F';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'G';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'H';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'I';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'J';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'K';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'L';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'M';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'N';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'O';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'P';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'Q';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'R';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'S';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'T';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'U';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'V';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'W';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'X';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'Y';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'Z';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'Å';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'Ä';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>

    <?php

        $bokstav = 'Ö';

        if(array_key_exists($bokstav, $all_sale_pages))
        {
            echo '
                <div class="row">
                <div class="col-md-12">
                <h2 id="'.$bokstav.'" class="heading">'.$bokstav.'</h2>
                <div class="row">

                <div class="col-md-3">
                <ul style="list-style:none; font-size: 16px;">
            ';

        $a = 1;

        foreach ($all_sale_pages[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rea/$row->slug") .'">';
                echo $row->nisch;
            echo '</a></li>';

            if($a % 3 === 0)
            {
                echo '</ul></div><div class="col-md-3"><ul style="list-style:none; font-size: 16px;">';
            }

            $a++;
        }

        echo '
            </div>
            </div>
            </div>
            </div>
        ';
    }
    ?>



</section>
