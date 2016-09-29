<div class="breadcrumbs-v4">
	<div class="container">
		<h1>Alla butiker</h1>
	</div><!--/end container-->
</div>


<section>
  <div class="container">


    <div class="row">
        <div class="col-md-12">

            <p class="text-center" style="padding: 20px; border: dashed 1px #bbb;  margin: 40px 0px 40px 0px; vertical-align: middle; font-size: 20px; word-spacing: 12px;">
                <a href="<?php echo base_url('butiker#A');?>">A</a>
                <a href="<?php echo base_url('butiker#B');?>">B</a>
                <a href="<?php echo base_url('butiker#C');?>">C</a>
                <a href="<?php echo base_url('butiker#D');?>">D</a>
                <a href="<?php echo base_url('butiker#E');?>">E</a>
                <a href="<?php echo base_url('butiker#F');?>">F</a>
                <a href="<?php echo base_url('butiker#G');?>">G</a>
                <a href="<?php echo base_url('butiker#H');?>">H</a>
                <a href="<?php echo base_url('butiker#I');?>">I</a>
                <a href="<?php echo base_url('butiker#J');?>">J</a>
                <a href="<?php echo base_url('butiker#K');?>">K</a>
                <a href="<?php echo base_url('butiker#L');?>">L</a>
                <a href="<?php echo base_url('butiker#M');?>">M</a>
                <a href="<?php echo base_url('butiker#N');?>">N</a>
                <a href="<?php echo base_url('butiker#O');?>">O</a>
                <a href="<?php echo base_url('butiker#P');?>">P</a>
                <a href="<?php echo base_url('butiker#Q');?>">Q</a>
                <a href="<?php echo base_url('butiker#R');?>">R</a>
                <a href="<?php echo base_url('butiker#S');?>">S</a>
                <a href="<?php echo base_url('butiker#T');?>">T</a>
                <a href="<?php echo base_url('butiker#U');?>">U</a>
                <a href="<?php echo base_url('butiker#V');?>">V</a>
                <a href="<?php echo base_url('butiker#W');?>">W</a>
                <a href="<?php echo base_url('butiker#X');?>">X</a>
                <a href="<?php echo base_url('butiker#Y');?>">Y</a>
                <a href="<?php echo base_url('butiker#Z');?>">Z</a>
                <a href="<?php echo base_url('butiker#Å');?>">Å</a>
                <a href="<?php echo base_url('butiker#Ä');?>">Ä</a>
                <a href="<?php echo base_url('butiker#Ö');?>">Ö</a>
            </p>
        </div>
    </div>

    <?php

        $bokstav = 'A';

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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

        if(array_key_exists($bokstav, $all_stores))
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

        foreach ($all_stores[$bokstav] as $row)
        {
            echo '<li><a href="'. base_url("rabattkod/$row->slug") .'">';
                echo $row->name;
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
