

<?php
include_once(APPPATH . "third_party/Mpdf60/Mpdf.php");
ini_set('memory_limit', '100024M');
set_time_limit(1200);
$mpdf = new mPDF('utf-8','A4');



    $id = isset($id) ? $id : 0;
    // select civil===========
    $qr = query("SELECT
                                        c.id,
                                        c.civil_servant_id,
                                        c.nationality_id,
                                        c.unit_code,
                                        c.common_official_code,
                                        c.unit_official_code,
                                        c.frame_work_code,
                                        c.firstname,
                                        c.lastname,
                                        c.english_full_name,
                                        c.gender,
                                        c.nationality,
                                        c.dateofbirth,
                                        c.mobile_phone,
                                        c.work_phone,
                                        c.photo,
                                        c.house_no,
                                        c.group_no,
                                        c.street,
                                        c.village,
                                        c.commune,
                                        c.district,
                                        c.province,
                                        c.current_house_no,
                                        c.current_group_no,
                                        c.current_street,
                                        c.current_village,
                                        c.current_commune,
                                        c.current_district,
                                        c.current_province,
                                        c.fax_number,
                                        c.email,
                                        c.website,
                                        c.family_name,
                                        c.family_dateofbirth,
                                        c.hus_or_wife,
                                        c.family_job,
                                        c.date_enter_salary,
                                        c.note_family,
                                        c.title
                                FROM
                                        civilservant AS c
                                WHERE
                                        c.id = '{$id}' ")->row();
    //  select language============
    $qr_l = query("SELECT
                                        l.language_id,
                                        l.id,
                                        l.`language`,
                                        l.`read`,
                                        l.conversation,
                                        l.`write`
                                FROM
                                        `language` AS l
                                WHERE
                                        l.id = '{$id}' ");
    $tr = "";
    if ($qr_l->num_rows() > 0) {
        foreach ($qr_l->result() as $rows) {
            $tr .="<tr>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->language . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->read . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->conversation . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->write . "</td>" .
                    "</tr>";
        }
    } else {
        $tr .="<tr>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    </tr>";
    }
    // select degree level = 1============
    $qr_d1 = query("SELECT
                                        d.degree_id,
                                        d.id,
                                        d.degree_level,
                                        d.skill,
                                        d.study_date,
                                        d.end_date,
                                        d.school,
                                        d.country,
                                        d.study_place,
                                        d.`level`
                                FROM
                                        degree AS d
                                WHERE
                                        d.`level` = '1'
                                AND d.id = '{$id}' ");
    $tr_d1 = "";
    if ($qr_d1->num_rows() > 0) {
        foreach ($qr_d1->result() as $rows) {
            $tr_d1 .="<tr>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->degree_level . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->school . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->study_place . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->skill . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->study_date . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->end_date . "</td>" .
                    "</tr>";
        }
    } else {
        $tr_d1 .="<tr>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    </tr>";
    }
    // select degree level = 2================
    $qr_d2 = query("SELECT
                                        d.degree_id,
                                        d.id,
                                        d.degree_level,
                                        d.skill,
                                        d.study_date,
                                        d.end_date,
                                        d.school,
                                        d.country,
                                        d.study_place,
                                        d.`level`
                                FROM
                                        degree AS d
                                WHERE
                                        d.`level` = '2'
                                AND d.id = '{$id}' ");
    $tr_d2 = "";
    if ($qr_d2->num_rows() > 0) {
        foreach ($qr_d2->result() as $rows) {
            $tr_d2 .="<tr>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->degree_level . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->school . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->study_place . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->skill . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->study_date . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->end_date . "</td>" .
                    "</tr>";
        }
    } else {
        $tr_d2 .="<tr>
                    <td style='height: 25px;padding: 5px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    </tr>";
    }
    //   select training > 3 mounth========
    $qr_t = query("SELECT
                                        t.train_id,
                                        t.id,
                                        t.start_date_train,
                                        t.stop_date_train,
                                        t.place_train,
                                        t.type_train,
                                        t.subject_course,
                                        t.level_train,
                                        t.school_train,
                                        t.skill_train,
                                        t.country
                                FROM
                                        training AS t
                                WHERE
                                        (
                                                DATEDIFF(
                                                        stop_date_train,
                                                        start_date_train
                                                )
                                        ) >= '90'
                                AND t.id = '{$id}' ");
    $tr_t = "";
    if ($qr_t->num_rows() > 0) {
        foreach ($qr_t->result() as $rows) {
            $tr_t .="<tr>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->level_train . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->school_train . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->place_train . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->skill_train . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->start_date_train . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->stop_date_train . "</td>" .
                    "</tr>";
        }
    } else {
        $tr_t .="<tr>
                    <td style='height: 25px;padding: 5px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    </tr>";
    }
    //      select gender children female======
    $qr_ch = query("SELECT
                                        COUNT(c.gender_child) AS female,
                                        c.id
                                FROM
                                        children AS c
                                WHERE
                                        c.gender_child = 'ស្រី'
                                AND c.id = '{$id}' ")->row();
    //         select gender children tatal========
    $qr_ch1 = query("SELECT
                                        COUNT(c.gender_child) AS total_ch,
                                                  c.id
                                FROM
                                        children AS c
                                WHERE c.id = '{$id}' ")->row();
    //         select work============
    $qr_w = query("SELECT
                                        w.work_id,
                                        w.id,
                                        w.current_role
                                FROM
                                        `work` AS w
                                WHERE
                                        w.id = '{$id}'")->row();
    $qr_wh = query("SELECT
                                        w.work_history_id,
                                        w.id,
                                        w.start_date,
                                        w.stop_date,
                                        w.institution,
                                        w.department,
                                        w.office,
                                        w.position
                                FROM
                                        workhistory AS w
                                WHERE
                                        w.id = '{$id}' ");
    $tr_wh = "";
    if ($qr_wh->num_rows() > 0) {
        foreach ($qr_wh->result() as $rows) {
            $tr_wh .="<tr>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->start_date . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->stop_date . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->institution . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->department . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->office . "</td>" .
                    "<td style='padding: 5px;border: 1px solid blue'>" . $rows->position . "</td>" .
                    "</tr>";
        }
    } else {
        $tr_wh .="<tr>
                    <td style='height: 25px;padding: 5px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    <td style='height: 25px;border: 1px solid blue'></td>
                    </tr>";
    }
    $qr_s= query("SELECT
                                        s.salary_level,
                                        s.id,
                                        s.salary_id
                                FROM
                                        salary AS s
                                WHERE
                                        s.id = '{$id}' ")->row();
    $html = '';
    $html .= '<div style="width: 100%;margin: 0 auto;font-family: khmermef1;font-size: 16px;line-height: 1.5;color: blue;">
                <div style="float: left;width: 79%;">
                  <div class="col-lg-6" style="font-family: khmermef2;">
                    <p>ឈ្មោះ  :'. $qr->lastname . ' ' . $qr->firstname .'</p>
                  </div>
                  <div class="col-lg-6" style="font-family: khmermef2;">
                    <p>ឈ្មោះឡាតាំង  :'. $qr->english_full_name .'</p>
                  </div>
                  <div class="col-lg-6" style="font-family: khmermef2;">
                    <p style=" width:100%;">ភេទ  :'. $qr->gender .'</span></p>
                  </div>
                  <div class="col-lg-6" style="font-family: khmermef2;">
                    <p  style=" width:100%;"> តួនាទីបច្ចុប្បន្ន&nbsp;&nbsp;&nbsp;&nbsp; :'. $qr_w->current_role .'</p></p>
                  </div>
                  <div class="col-lg-6" style="font-family: khmermef2;">
                    <p  style=" width:100%;"> ថ្ងៃខែឆ្នាំកំណើត&nbsp;&nbsp;&nbsp;&nbsp; :'. $qr->dateofbirth .'</p>
                  </div>
                  <div class="col-lg-6" style="font-family: khmermef2;">
                    <p style="font-family: khmermef2;"><span style="font-family: khmermef1;">សញ្ជាតិ&nbsp;&nbsp;&nbsp;&nbsp;</span>' . $qr->nationality .'</p>
                  </div>
                </div>
                <div style="float: left; width: 20%;">
                    <img width="130px;" height="171px;" src="'. base_url() . 'assets/csv/photos/' . $id . '.jpg' .'"  />
                </div>
            </div>';
    $html .='<div style="width: 100%;margin: 0 auto;font-family: khmermef1;font-size: 16px;line-height: 1.5;color: blue;">
         <div style="float: left; width: 22%;  margin-top: -25px;">
            <p>ទីកន្លែងកំណើត</p>
            <p>អត្តលេខមន្ត្រី</p>
            <p>កាំបៀវត្ស</p>
            <p>ទូរស័ព្ទ</p>
         </div>
         <div style="float: left;width: 78%;margin-top: -185px; margin-left: 22%">
            <p>'. 'ភូមិ ' . $qr->village . ' ឃុំ ' . $qr->commune . ' ស្រុក ' . $qr->district . ' ខេត្ត ' . $qr->province .'</p>
            <p>'. $qr->civil_servant_id .'</p>
            <p>'. $qr_s->salary_level .'</p>
            <p>'. $qr->mobile_phone .'</p>
         </div>
     </div>
     ';
    //  family informations========
     $html .='<table style="width: 100%; font-family: khmermef1; font-size: 16px;"color: blue;>
        <caption style="font-family: khmer mef2;text-align: left;color: blue;">ក. ព័ត៌មានគ្រួសារ</caption><br /><br />
        <tr>
            <td style="padding-top: 15px;color: blue;">ប្រពន្ធ ឫប្តីឈ្មោះ</td>
            <td style="font-family: khmermef2;padding-top: 15px;color: blue;">'. $qr->family_name .'</td>
            <td style="padding-top: 15px;color: blue;">'.  'ថ្ងៃខែឆ្នាំកំណើត&nbsp;&nbsp;&nbsp;&nbsp;' . $qr->family_dateofbirth .'</td>
            <td style="padding-top: 15px;color: blue;">'.  'មុខរបរ&nbsp;&nbsp;&nbsp;&nbsp;' . $qr->family_job .'</td>
        </tr>
        <tr>
            <td style="padding-top: 15px;color: blue;">កូនចំនួន</td>
            <td style="padding-top: 15px;color: blue;">'.  $qr_ch1->total_ch . ' នាក់' .'</td>
            <td style="padding-top: 15px;color: blue;">'.  '(ស្រី ' . $qr_ch->female . ' នាក់)' .'</td>
        </tr>
        <tr>
            <td style="padding-top: 15px;color: blue;">អាសយដ្ឋានបច្ចុប្បន្ន</td>
            <td style="padding-top: 15px;color: blue;" colspan="3">'.  'ផ្ទះលេខ ' . $qr->current_house_no . ' ក្រុមទី ' . $qr->current_group_no . ' ផ្លូវលេខ ' . $qr->current_street . ' ភូមិ ' . $qr->current_village . ' ឃុំ-សង្កាត់ ' . $qr->current_commune . ' <br /><br />ស្រុក-ខ័ណ្ឌ ' . $qr->current_district . ' ខេត្ត-ក្រុង ' . $qr->current_province .'</td>
        </tr>
    </table>';
    // language information======
     $html .= '<table border="1" style="width: 100%; border-collapse:collapse; text-align: center; font-family: khmermef1; line-height: 1.5; color: blue">
        <caption style="text-align: left; font-family: khmermef2;color: blue;" >ខ. ភាសាបរទេស</caption><br /><br />
        <thead>
            <tr>
                <td style="text-align: center;padding: 5px; border: 1px solid blue">ភាសា</td>
                <td style="text-align: center;padding: 5px; border: 1px solid blue">ការអាន</td>
                <td style="text-align: center;padding: 5px; border: 1px solid blue">ការសន្ទនា</td>
                <td style="text-align: center;padding: 5px; border: 1px solid blue">ការសរសេរ</td>
            </tr>
        </thead>
        <tbody>
            '. $tr .'
        </tbody>
    </table> ';
    // degree informations========
      $html .='<table border="1" style="width: 100%; border-collapse:collapse; text-align: center; font-family: khmermef1; line-height: 1.5;color: blue;">
        <caption style="text-align: left; font-family: khmermef2;color: blue;" >គ. កម្រិតវប្បធម៌</caption><br /><br />
        <thead>
            <tr>
                <td style="text-align: center;padding: 5px; border: 1px solid blue">វគ្គ ឫកម្រិតសិក្សា</td>
                <td style="text-align: center; border: 1px solid blue">គ្រឹះស្ថានសិក្សា-បណ្តុះបណ្តាល</td>
                <td style="text-align: center; border: 1px solid blue">ទីកន្លែងសិក្សា</td>
                <td style="text-align: center; border: 1px solid blue">ឈ្មោះសញ្ញាបត្រ/ ជំនាញ</td>
                <td style="text-align: center; border: 1px solid blue">ថ្ងៃខែឆ្នាំចូលសិក្សា</td>
                <td style="text-align: center; border: 1px solid blue">ថ្ងៃខែឆ្នាំបញ្ចប់សិក្សា</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="6" style="text-align: left; font-family: khmer mef2;padding: 5px;border: 1px solid blue" >- កម្រិតវប្បធម៌ទូទៅ</td>
            </tr>
            '. $tr_d1 .'
            <tr>
                <td colspan="6" style="text-align: left; font-family: khmer mef2;padding: 5px;border: 1px solid blue" >- កម្រិតឧត្តម និងក្រោយឧត្តម</td>
            </tr>
            '. $tr_d2 .'
            <tr>
                <td colspan="6" style="text-align: left; font-family: khmer mef2;padding: 5px;border: 1px solid blue" >- វគ្គបណ្តុះបណ្តាលផ្សេងៗ (ចាប់ពី ៣ ខែឡើងទៅ)</td>
            </tr>
            '. $tr_t .'
        </tbody>
    </table> ';
    // work history informations=============
     $html .='<table border="1" style="width: 100%; border-collapse:collapse; text-align: center; font-family: khmermef1;color: blue;">
        <caption style="text-align: left; font-family: khmer mef2;color: blue;" >ឃ. ប្រវត្តិការងារ</caption><br /><br />
        <thead>
            <tr>
                <td style="text-align: center;padding: 5px;border: 1px solid blue">ថ្ងៃខែឆ្នាំផ្តើម</td>
                <td style="text-align: center;border: 1px solid blue">ថ្ងៃខែឆ្នាំបញ្ចប់</td>
                <td style="text-align: center;border: 1px solid blue">ក្រសួង/ ស្ថាប័ន</td>
                <td style="text-align: center;border: 1px solid blue">នាយកដ្ឋាន/ អង្គភាព</td>
                <td style="text-align: center;border: 1px solid blue">ការិយាល័យ</th>
                <td style="text-align: center;border: 1px solid blue">មុខតំណែង</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                '. $tr_wh .'
            </tr>
        </tbody>
    </table> ';

    echo $html;
     ?>
