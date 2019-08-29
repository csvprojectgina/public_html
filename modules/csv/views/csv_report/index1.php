<?php
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
                "<td>" . $rows->language . "</td>" .
                "<td>" . $rows->read . "</td>" .
                "<td>" . $rows->conversation . "</td>" .
                "<td>" . $rows->write . "</td>" .
                "</tr>";
    }
} else {
    $tr .="<tr>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
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
                "<td>" . $rows->degree_level . "</td>" .
                "<td>" . $rows->school . "</td>" .
                "<td>" . $rows->study_place . "</td>" .
                "<td>" . $rows->skill . "</td>" .
                "<td>" . $rows->study_date . "</td>" .
                "<td>" . $rows->end_date . "</td>" .
                "</tr>";
    }
} else {
    $tr_d1 .="<tr>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
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
                "<td>" . $rows->degree_level . "</td>" .
                "<td>" . $rows->school . "</td>" .
                "<td>" . $rows->study_place . "</td>" .
                "<td>" . $rows->skill . "</td>" .
                "<td>" . $rows->study_date . "</td>" .
                "<td>" . $rows->end_date . "</td>" .
                "</tr>";
    }
} else {
    $tr_d2 .="<tr>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
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
                "<td>" . $rows->level_train . "</td>" .
                "<td>" . $rows->school_train . "</td>" .
                "<td>" . $rows->place_train . "</td>" .
                "<td>" . $rows->skill_train . "</td>" .
                "<td>" . $rows->start_date_train . "</td>" .
                "<td>" . $rows->stop_date_train . "</td>" .
                "</tr>";
    }
} else {
    $tr_t .="<tr>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
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
                "<td>" . $rows->start_date . "</td>" .
                "<td>" . $rows->stop_date . "</td>" .
                "<td>" . $rows->institution . "</td>" .
                "<td>" . $rows->department . "</td>" .
                "<td>" . $rows->office . "</td>" .
                "<td>" . $rows->position . "</td>" .
                "</tr>";
    }
} else {
    $tr_wh .="<tr>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
                <td style='height: 25px;'></td>
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
?>
<!--personal information=======-->
    <div id="container">
    <div id="primary">
        <p style="font-family: khmer mef2;"><?= $qr->lastname . ' ' . $qr->firstname ?></p>
        <p style="font-family: khmer mef2;"><?= '<span style="font-family: khmer mef1;">ភេទ&nbsp;&nbsp;&nbsp;&nbsp;</span>' . $qr->gender ?></p>
        <p>តួនាទីបច្ចុប្បន្ន</p>
        <p>ថ្ងៃខែឆ្នាំកំណើត</p>
    </div>
    <div id="content">
        <p><?= $qr->english_full_name ?></p>
        <p style="font-family: khmer mef2;"><?= '<span style="font-family: khmer mef1;">សញ្ជាតិ&nbsp;&nbsp;&nbsp;&nbsp;</span>' . $qr->nationality ?></p>
        <p><?= $qr_w->current_role ?></p>
        <p><?= $qr->dateofbirth ?></p>
    </div>
    <div id="secondary">
        <img width="130px;" height="171px;" src="<?= base_url() . 'assets/csv/photos/' . $id . '.jpg' ?>"  />
    </div>
</div>


 <div id="container">
     <div id="primary1">
        <p>ទីកន្លែងកំណើត</p>
        <p>អត្តលេខមន្ត្រី</p>
        <p>កាំបៀវត្ស</p>
        <p>ទូរស័ព្ទ</p>
     </div>
     <div id="content1">
        <p><?= 'ភូមិ ' . $qr->village . ' ឃុំ ' . $qr->commune . ' ស្រុក ' . $qr->district . ' ខេត្ត ' . $qr->province ?></p>
        <p><?= $qr->civil_servant_id ?></p>
        <p><?= $qr_s->salary_level ?></p>
        <p><?= $qr->mobile_phone ?></p>
     </div>
 </div>

<!--family informations========-->
<table style="width: 100%; font-family: khmer mef1;">
    <caption style="font-family: khmer mef2;text-align: left;">ក. ព័ត៌មានគ្រួសារ</caption><br /><br />
    <tr>
        <td>ប្រពន្ធ ឫប្តីឈ្មោះ</td>
        <td style="font-family: khmer mef2;"><?= $qr->family_name ?></td>
        <td><?= 'ថ្ងៃខែឆ្នាំកំណើត&nbsp;&nbsp;&nbsp;&nbsp;' . $qr->family_dateofbirth ?></td>
        <td><?= 'មុខរបរ&nbsp;&nbsp;&nbsp;&nbsp;' . $qr->family_job ?></td>
    </tr>
    <tr>
        <td>កូនចំនួន</td>
        <td><?= $qr_ch1->total_ch . ' នាក់' ?></td>
        <td><?= '(ស្រី ' . $qr_ch->female . ' នាក់)' ?></td>
    </tr>
    <tr>
        <td>អាសយដ្ឋានបច្ចុប្បន្ន</td>
        <td colspan="3"><?= 'ផ្ទះលេខ ' . $qr->current_house_no . ' ក្រុមទី ' . $qr->current_group_no . ' ផ្លូវលេខ ' . $qr->current_street . ' ភូមិ ' . $qr->current_village . ' ឃុំ-សង្កាត់ ' . $qr->current_commune . ' ស្រុក-ខ័ណ្ឌ ' . $qr->current_district . ' ខេត្ត-ក្រុង ' . $qr->current_province ?></td>
    </tr>
</table>
<!--language information======-->
<table border='1' style='width: 100%; border-collapse:collapse; text-align: center; font-family: khmer mef1'>
    <caption style="text-align: left; font-family: khmer mef2;" >ខ. ភាសាបរទេស</caption><br /><br />
    <thead>
        <tr>
            <th style="text-align: center;">ភាសា</th>
            <th style="text-align: center;">ការអាន</th>
            <th style="text-align: center;">ការសន្ទនា</th>
            <th style="text-align: center;">ការសរសេរ</th>
        </tr>
    </thead>
    <tbody>
        <?= $tr ?>
    </tbody>
</table>
<!--degree informations========-->
<table border='1' style='width: 100%; border-collapse:collapse; text-align: center; font-family: khmer mef1'>
    <caption style="text-align: left; font-family: khmer mef2;" >គ. កម្រិតវប្បធម៌</caption><br /><br />
    <thead>
        <tr>
            <th style="text-align: center;">វគ្គ ឫកម្រិតសិក្សា</th>
            <th style="text-align: center;">គ្រឹះស្ថានសិក្សា-បណ្តុះបណ្តាល</th>
            <th style="text-align: center;">ទីកន្លែងសិក្សា</th>
            <th style="text-align: center;">ឈ្មោះសញ្ញាបត្រ/ ជំនាញ</th>
            <th style="text-align: center;">ថ្ងៃខែឆ្នាំចូលសិក្សា</th>
            <th style="text-align: center;">ថ្ងៃខែឆ្នាំបញ្ចប់សិក្សា</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="6" style="text-align: left; font-family: khmer mef2;" >- កម្រិតវប្បធម៌ទូទៅ</td>
        </tr>
        <?= $tr_d1 ?>
        <tr>
            <td colspan="6" style="text-align: left; font-family: khmer mef2;" >- កម្រិតឧត្តម និងក្រោយឧត្តម</td>
        </tr>
        <?= $tr_d2 ?>
        <tr>
            <td colspan="6" style="text-align: left; font-family: khmer mef2;" >- វគ្គបណ្តុះបណ្តាលផ្សេងៗ (ចាប់ពី ៣ ខែឡើងទៅ)</td>
        </tr>
        <?= $tr_t ?>
    </tbody>
</table>
<!--work history informations=============-->
<table border='1' style='width: 100%; border-collapse:collapse; text-align: center; font-family: khmer mef1'>
    <caption style="text-align: left; font-family: khmer mef2;" >ឃ. ប្រវត្តិការងារ</caption><br /><br />
    <thead>
        <tr>
            <th style="text-align: center;">ថ្ងៃខែឆ្នាំផ្តើម</th>
            <th style="text-align: center;">ថ្ងៃខែឆ្នាំបញ្ចប់</th>
            <th style="text-align: center;">ក្រសួង/ ស្ថាប័ន</th>
            <th style="text-align: center;">នាយកដ្ឋាន/ អង្គភាព</th>
            <th style="text-align: center;">ការិយាល័យ</th>
            <th style="text-align: center;">មុខតំណែង</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?= $tr_wh ?>
        </tr>
    </tbody>
</table>

<style>
#container {
    width: 100%;margin: 0 auto;font-family: khmer mef1;font-size: 16px;
}
#primary {
    float: left;width: 22%;
}
#content {
    float: left;width: 58%;
}
#secondary {
    float: left;width: 12%;
}

#primary1 {
    float: left; width: 22%;
}
#content1 {
    float: left;width: 70%;
}
</style>
