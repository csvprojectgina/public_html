
<div style="margin-bottom: 10px">
  <table class="table" align="center" style="text-align: center;font-family: khmer mef1;color: blue;">
        <tbody>
            <tr>
                <td>របាយការណ៍មន្រ្តីលម្អិតតាមតួនាទី</td>
            </tr>
        </tbody>
    </table>
    <table  align="center" class="table table-bordered table-hover" >
        <thead>
            <tr >
                <th rowspan="2">លរ</th>
                <th rowspan="2">អង្គភាព</th>
                <th rowspan="2">ក្របខ័ណ្ឌ</th>
                <th colspan="2">10</th>
                <th colspan="2">9</th>
                <th colspan="2">8</th>
                <th colspan="2">7</th>
                <th colspan="2">6</th>
                <th colspan="2">5</th>
                <th colspan="2">4</th>
                <th colspan="2">3</th>
                <th colspan="2">2</th>
                <th colspan="2">1</th>
                <th colspan="2">សរុប</th>
            </tr>
            <tr style="vertical-align: middle;">
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
            </tr>
        </thead>
        <tbody>
        <!-- អគ្គ.រដ្ឌបាល -->
            <!-- ក្របខ័ណ្ឌក -->
            <tr>
                <td  rowspan="11"​ style="vertical-align:middle;">1</td>
                <td rowspan="11" style="vertical-align:middle;">អគ្គ.រដ្ឌបាល</td>
                <td>ក.១</td>
                <?php
                $array = array("១០","៩","៨","៧","៦","៥","៤","៣","២","១");
                foreach ($array as $row) {

                    $query = $this->db->query("SELECT
                  	(
                  		SELECT DISTINCT
                  			COUNT(w.id)
                  		FROM
                  			`work` AS w
                  		INNER JOIN civilservant AS ci ON ci.id = w.id
                  		LEFT  JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                  		WHERE
                  		gd.general_dep_id = 7
                  		AND w.type_of_framework = 'ក.១.{$row}'
                  	) AS total,
                  	count(gender) AS female
                  FROM
                  	`work` AS w
                  INNER JOIN civilservant AS ci ON ci.id = w.id
                  LEFT  JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                  WHERE
                  	gd.general_dep_id = 7
                  	AND w.type_of_framework = 'ក.១.{$row}'
                  AND gender = 'ស្រី'");
                            foreach ($query->result() as $row) {

                                echo '<td style="text-align:center;">' . $row->total . '</td>';
                                echo '<td style="text-align:center;">' . $row->female . '</td>';
                            }

                }
                /*total and total female*/
                $query_total_female=$this->db->query("
                SELECT
                    (
                    SELECT DISTINCT
                    COUNT(w.id)
                    FROM
                    `work` AS w
                    INNER JOIN civilservant AS ci ON ci.id = w.id
                    LEFT JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                    WHERE
                    gd.general_dep_id = 7
                    AND w.type_of_framework LIKE '%ក.១%'
                    ) AS total,
                    count(gender) AS female
                    FROM
                    `work` AS w
                    INNER JOIN civilservant AS ci ON ci.id = w.id
                    LEFT JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                    WHERE
                    gd.general_dep_id = 7
                    AND w.type_of_framework LIKE '%ក.១%'
                    AND gender = 'ស្រី'
                        ");
                       foreach ($query_total_female->result() as $total_row) {

                                echo '<td style="text-align:center;">' . $total_row->total . '</td>';
                                echo '<td style="text-align:center;">' . $total_row->female . '</td>';
                            }
                ?>
            </tr>
            <tr>
               <td>ក.២</td>
                <?php
                $array = array("១០","៩","៨","៧","៦","៥","៤","៣","២","១");
                foreach ($array as $row) {

                    $query = $this->db->query("SELECT
                    (
                      SELECT DISTINCT
                        COUNT(w.id)
                      FROM
                        `work` AS w
                      INNER JOIN civilservant AS ci ON ci.id = w.id
                      LEFT  JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                      WHERE
                      gd.general_dep_id = 7
                      AND w.type_of_framework = 'ក.២.{$row}'
                    ) AS total,
                    count(gender) AS female
                  FROM
                    `work` AS w
                  INNER JOIN civilservant AS ci ON ci.id = w.id
                  LEFT  JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                  WHERE
                    gd.general_dep_id = 7
                    AND w.type_of_framework = 'ក.២.{$row}'
                  AND gender = 'ស្រី'");
                    foreach ($query->result() as $row) {

                        echo '<td style="text-align:center;">' . $row->total . '</td>';
                        echo '<td style="text-align:center;">' . $row->female . '</td>';
                    }
                }
                 /*total and total female*/
                $query_total_female=$this->db->query("
                SELECT
                    (
                    SELECT DISTINCT
                    COUNT(w.id)
                    FROM
                    `work` AS w
                    INNER JOIN civilservant AS ci ON ci.id = w.id
                    LEFT JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                    WHERE
                    gd.general_dep_id = 7
                    AND w.type_of_framework LIKE '%ក.២%'
                    ) AS total,
                    count(gender) AS female
                    FROM
                    `work` AS w
                    INNER JOIN civilservant AS ci ON ci.id = w.id
                    LEFT JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                    WHERE
                    gd.general_dep_id = 7
                    AND w.type_of_framework LIKE '%ក.២%'
                    AND gender = 'ស្រី'
                        ");
                       foreach ($query_total_female->result() as $total_row) {

                                echo '<td style="text-align:center;">' . $total_row->total . '</td>';
                                echo '<td style="text-align:center;">' . $total_row->female . '</td>';
                            }
                ?>
            </tr>
            <tr>

                <td>ក.៣</td>
                <?php
                $array = array("១០","៩","៨","៧","៦","៥","៤","៣","២","១");
                foreach ($array as $row) {

                    $query = $this->db->query("SELECT
                  	(
                  		SELECT DISTINCT
                  			COUNT(w.id)
                  		FROM
                  			`work` AS w
                  		INNER JOIN civilservant AS ci ON ci.id = w.id
                  		LEFT  JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                  		WHERE
                  		gd.general_dep_id = 7
                  		AND w.type_of_framework = 'ក.៣.{$row}'
                  	) AS total,
                  	count(gender) AS female
                  FROM
                  	`work` AS w
                  INNER JOIN civilservant AS ci ON ci.id = w.id
                  LEFT  JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                  WHERE
                  	gd.general_dep_id = 7
                  	AND w.type_of_framework = 'ក.៣.{$row}'
                  AND gender = 'ស្រី'");
                    foreach ($query->result() as $row) {

                        echo '<td style="text-align:center;">' . $row->total . '</td>';
                        echo '<td style="text-align:center;">' . $row->female . '</td>';
                    }
                }
                 /*total and total female*/
                $query_total_female=$this->db->query("
                SELECT
                    (
                    SELECT DISTINCT
                    COUNT(w.id)
                    FROM
                    `work` AS w
                    INNER JOIN civilservant AS ci ON ci.id = w.id
                    LEFT JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                    WHERE
                    gd.general_dep_id = 7
                    AND w.type_of_framework LIKE '%ក.៣%'
                    ) AS total,
                    count(gender) AS female
                    FROM
                    `work` AS w
                    INNER JOIN civilservant AS ci ON ci.id = w.id
                    LEFT JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                    WHERE
                    gd.general_dep_id = 7
                    AND w.type_of_framework LIKE '%ក.៣%'
                    AND gender = 'ស្រី'
                        ");
                       foreach ($query_total_female->result() as $total_row) {

                                echo '<td style="text-align:center;">' . $total_row->total . '</td>';
                                echo '<td style="text-align:center;">' . $total_row->female . '</td>';
                            }
                ?>
            </tr>
            <tr>
              <td colspan="21" class="text-center">សរុបក្របខ័ណ ក</td>
              <?php
              /*total k2*/
             $query_total_k3=$this->db->query("SELECT
                (
                  SELECT DISTINCT
                    COUNT(w.id)
                  FROM
                    `work` AS w
                  INNER JOIN civilservant AS ci ON ci.id = w.id
                  LEFT JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                  WHERE
                    gd.general_dep_id = 7
                  AND w.type_of_framework LIKE '%ក%'
                ) AS total,
                count(gender) AS female
              FROM
                `work` AS w
              INNER JOIN civilservant AS ci ON ci.id = w.id
              LEFT JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
              WHERE
                gd.general_dep_id = 7
              AND w.type_of_framework LIKE '%ក%'
              AND ci.gender = 'ស្រី'");
			  foreach ($query_total_k3->result() as $total_row) {
                             echo '<td style="text-align:center;">' . $total_row->total . '</td>';
                             echo '<td style="text-align:center;">' . $total_row->female . '</td>';
			}
              ?>

            </tr>
            <!-- ក្របខ័ណ្ឌខ -->
            <tr>
                <td>ខ.១</td>
                <?php
                $array = array("១០","៩","៨","៧","៦","៥","៤","៣","២","១");
                foreach ($array as $row) {
					$query = $this->db->query("SELECT
                  	(
                  		SELECT DISTINCT
                  			COUNT(w.id)
                  		FROM
                  			`work` AS w
                  		INNER JOIN civilservant AS ci ON ci.id = w.id
                  		LEFT  JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                  		WHERE
                  		gd.general_dep_id = 7
                  		AND w.type_of_framework = 'ខ.១.{$row}'
                  	) AS total,
                  	count(gender) AS female
                  FROM
                  	`work` AS w
                  INNER JOIN civilservant AS ci ON ci.id = w.id
                  LEFT  JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                  WHERE
                  	gd.general_dep_id = 7
                  	AND w.type_of_framework = 'ខ.១.{$row}'
                  AND gender = 'ស្រី'");
                            foreach ($query->result() as $row) {

                                echo '<td style="text-align:center;">' . $row->total . '</td>';
                                echo '<td style="text-align:center;">' . $row->female . '</td>';
                            }

                }
                /*total and total female*/
                $query_total_female=$this->db->query("
                SELECT
                    (
                    SELECT DISTINCT
                    COUNT(w.id)
                    FROM
                    `work` AS w
                    INNER JOIN civilservant AS ci ON ci.id = w.id
                    LEFT JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                    WHERE
                    gd.general_dep_id = 7
                    AND w.type_of_framework LIKE '%ខ.១%'
                    ) AS total,
                    count(gender) AS female
                    FROM
                    `work` AS w
                    INNER JOIN civilservant AS ci ON ci.id = w.id
                    LEFT JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                    WHERE
                    gd.general_dep_id = 7
                    AND w.type_of_framework LIKE '%ខ.១%'
                    AND gender = 'ស្រី'
                        ");
                       foreach ($query_total_female->result() as $total_row) {

                                echo '<td style="text-align:center;">' . $total_row->total . '</td>';
                                echo '<td style="text-align:center;">' . $total_row->female . '</td>';
                            }
                ?>
            </tr>
            <tr>
               <td>ខ.២</td>
                <?php
                $array = array("១០","៩","៨","៧","៦","៥","៤","៣","២","១");
                foreach ($array as $row) {
                    $query = $this->db->query("SELECT
                    (
                      SELECT DISTINCT
                        COUNT(w.id)
                      FROM
                        `work` AS w
                      INNER JOIN civilservant AS ci ON ci.id = w.id
                      LEFT  JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                      WHERE
                      gd.general_dep_id = 7
                      AND w.type_of_framework = 'ក.២.{$row}'
                    ) AS total,
                    count(gender) AS female
                  FROM
                    `work` AS w
                  INNER JOIN civilservant AS ci ON ci.id = w.id
                  LEFT  JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                  WHERE
                    gd.general_dep_id = 7
                    AND w.type_of_framework = 'ក.២.{$row}'
                  AND gender = 'ស្រី'");
                    foreach ($query->result() as $row) {
                        echo '<td style="text-align:center;">' . $row->total . '</td>';
                        echo '<td style="text-align:center;">' . $row->female . '</td>';
                    }
                }
                 /*total and total female*/
                $query_total_female=$this->db->query("
				SELECT
                    (
                    SELECT DISTINCT
                    COUNT(w.id)
                    FROM
                    `work` AS w
                    INNER JOIN civilservant AS ci ON ci.id = w.id
                    LEFT JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                    WHERE
                    gd.general_dep_id = 7
                    AND w.type_of_framework LIKE '%ខ.២%'
                    ) AS total,
                    count(gender) AS female
                    FROM
                    `work` AS w
                    INNER JOIN civilservant AS ci ON ci.id = w.id
                    LEFT JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                    WHERE
                    gd.general_dep_id = 7
                    AND w.type_of_framework LIKE '%ខ.២%'
                    AND gender = 'ស្រី'
                        ");
                       foreach ($query_total_female->result() as $total_row) {

                                echo '<td style="text-align:center;">' . $total_row->total . '</td>';
                                echo '<td style="text-align:center;">' . $total_row->female . '</td>';
                            }
                ?>
            </tr>
            <tr>
                <td>ខ.៣</td>
                <?php
                $array = array("១០","៩","៨","៧","៦","៥","៤","៣","២","១");
                foreach ($array as $row) {

                    $query = $this->db->query("SELECT
                  	(
                  		SELECT DISTINCT
                  			COUNT(w.id)
                  		FROM
                  			`work` AS w
                  		INNER JOIN civilservant AS ci ON ci.id = w.id
                  		LEFT  JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                  		WHERE
                  		gd.general_dep_id = 7
                  		AND w.type_of_framework = 'ខ.៣.{$row}'
                  	) AS total,
                  	count(gender) AS female
                  FROM
                  	`work` AS w
                  INNER JOIN civilservant AS ci ON ci.id = w.id
                  LEFT  JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                  WHERE
                  	gd.general_dep_id = 7
                  	AND w.type_of_framework = 'ខ.៣.{$row}'
                  AND gender = 'ស្រី'");
                    foreach ($query->result() as $row) {

                        echo '<td style="text-align:center;">' . $row->total . '</td>';
                        echo '<td style="text-align:center;">' . $row->female . '</td>';
                    }
                }
                 /*total and total female*/
                $query_total_female=$this->db->query("
                SELECT
                    (
                    SELECT DISTINCT
                    COUNT(w.id)
                    FROM
                    `work` AS w
                    INNER JOIN civilservant AS ci ON ci.id = w.id
                    LEFT JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                    WHERE
                    gd.general_dep_id = 7
                    AND w.type_of_framework LIKE '%ខ.៣%'
                    ) AS total,
                    count(gender) AS female
                    FROM
                    `work` AS w
                    INNER JOIN civilservant AS ci ON ci.id = w.id
                    LEFT JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                    WHERE
                    gd.general_dep_id = 7
                    AND w.type_of_framework LIKE '%ខ.៣%'
                    AND gender = 'ស្រី'
                        ");
                       foreach ($query_total_female->result() as $total_row) {

                                echo '<td style="text-align:center;">' . $total_row->total . '</td>';
                                echo '<td style="text-align:center;">' . $total_row->female . '</td>';
                            }
                ?>
            </tr>
            <tr>
              <td colspan="21" class="text-center">សរុបក្របខ័ណ ខ</td>
              <?php
              /*total k2*/
             $query_total_k2=$this->db->query("
             SELECT
              	(
              		SELECT DISTINCT
              			COUNT(w.id)
              		FROM
              			`work` AS w
              		INNER JOIN civilservant AS ci ON ci.id = w.id
              		LEFT JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
              		WHERE
              			gd.general_dep_id = 7
              		AND w.type_of_framework LIKE '%ខ%'
              	) AS total,
              	count(gender) AS female
              FROM
              	`work` AS w
              INNER JOIN civilservant AS ci ON ci.id = w.id
              LEFT JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
              WHERE
              	gd.general_dep_id = 7
              AND w.type_of_framework LIKE '%ខ%'
              AND ci.gender = 'ស្រី'
                     ");
                    foreach ($query_total_k2->result() as $total_row) {
                             echo '<td style="text-align:center;">' . $total_row->total . '</td>';
                             echo '<td style="text-align:center;">' . $total_row->female . '</td>';
                         }
              ?>
            </tr>
            <!-- ក្របខ័ណ្ឌ គ -->
            <tr>
                  <td>គ</td>
                  <?php
                  $array = array("១០","៩","៨","៧","៦","៥","៤","៣","២","១");
                  foreach ($array as $row) {
                      $query = $this->db->query("SELECT
                    	(
                    		SELECT DISTINCT
                    			COUNT(w.id)
                    		FROM
                    			`work` AS w
                    		INNER JOIN civilservant AS ci ON ci.id = w.id
                    		LEFT  JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                    		WHERE
                    		gd.general_dep_id = 7
                    		AND w.type_of_framework = 'គ.{$row}'
                    	) AS total,
                    	count(gender) AS female
                    FROM
                    	`work` AS w
                    INNER JOIN civilservant AS ci ON ci.id = w.id
                    LEFT  JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                    WHERE
                    	gd.general_dep_id = 7
                    	AND w.type_of_framework = 'គ.{$row}'
                    AND gender = 'ស្រី'");
                      foreach ($query->result() as $row) {

                          echo '<td style="text-align:center;">' . $row->total . '</td>';
                          echo '<td style="text-align:center;">' . $row->female . '</td>';
                      }
                  }
                   /*total and total female*/
                  $query_total_female=$this->db->query("
                  SELECT
              (
              SELECT DISTINCT
              COUNT(w.id)
              FROM
              `work` AS w
              INNER JOIN civilservant AS ci ON ci.id = w.id
              LEFT JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
              WHERE
              gd.general_dep_id = 7
              AND w.type_of_framework LIKE '%គ%'
              ) AS total,
              count(gender) AS female
              FROM
              `work` AS w
              INNER JOIN civilservant AS ci ON ci.id = w.id
              LEFT JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
              WHERE
              gd.general_dep_id = 7
              AND w.type_of_framework LIKE '%គ%'
                AND gender = 'ស្រី'");
                         foreach ($query_total_female->result() as $total_row) {

                                  echo '<td style="text-align:center;">' . $total_row->total . '</td>';
                                  echo '<td style="text-align:center;">' . $total_row->female . '</td>';
                              }
                  ?>
              </tr>
            <tr>
                <td colspan="21" class="text-center">សរុបក្របខ័ណ គ</td>
                <?php
                /*total k2*/
               $query_total_k3=$this->db->query("
               SELECT
                	(
                		SELECT DISTINCT
                			COUNT(w.id)
                		FROM
                			`work` AS w
                		INNER JOIN civilservant AS ci ON ci.id = w.id
                		LEFT JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                		WHERE
                			gd.general_dep_id = 7
                		AND w.type_of_framework LIKE '%គ%'
                	) AS total,
                	count(gender) AS female
                FROM
                	`work` AS w
                INNER JOIN civilservant AS ci ON ci.id = w.id
                LEFT JOIN general_departments AS gd ON gd.general_dep_id = w.general_department
                WHERE
                	gd.general_dep_id = 7
                AND w.type_of_framework LIKE '%គ%'
                AND ci.gender = 'ស្រី'
                       ");
                      foreach ($query_total_k3->result() as $total_row) {
                               echo '<td style="text-align:center;">' . $total_row->total . '</td>';
                               echo '<td style="text-align:center;">' . $total_row->female . '</td>';
                           }
                ?>
            </tr>
        </tbody>
    </table>

</div>
