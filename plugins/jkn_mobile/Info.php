<?php

return [
    'name'          =>  'JKN Mobile',
    'description'   =>  'Modul mLITE JKN Mobile API',
    'author'        =>  'Basoro',
    'version'       =>  '1.0',
    'compatibility' =>  '2023',
    'icon'          =>  'tasks',
    'pages'         =>  ['JKN Mobile' => 'jknmobile'],
    'install'       =>  function () use ($core) {
      $core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('jkn_mobile', 'x_username', 'rsiaannisa0609')");
      $core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('jkn_mobile', 'x_password', 'rsiaannisa0609')");
      $core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('jkn_mobile', 'header_token', 'x-token')");
      $core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('jkn_mobile', 'header_username', 'x-username')");
      $core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('jkn_mobile', 'header_password', 'x-password')");
      $core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('jkn_mobile', 'BpjsConsID', '10756')");
      $core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('jkn_mobile', 'BpjsSecretKey', '4tGA87EAC0')");
      $core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('jkn_mobile', 'BpjsUserKey', '0b861fa0640fe9194e08fce7c75a8187')");
      $core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('jkn_mobile', 'BpjsAntrianUrl', 'https://apijkn.bpjs-kesehatan.go.id/antreanrs')");
      $core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('jkn_mobile', 'kd_pj_bpjs', 'BPJ')");
      $core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('jkn_mobile', 'exclude_taskid', '')");
      $core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('jkn_mobile', 'display', '')");
      $core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('jkn_mobile', 'kdprop', '1')");
      $core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('jkn_mobile', 'kdkab', '1')");
      $core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('jkn_mobile', 'kdkec', '1')");
      $core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('jkn_mobile', 'kdkel', '1')");
      $core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('jkn_mobile', 'perusahaan_pasien', '')");
      $core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('jkn_mobile', 'suku_bangsa', '')");
      $core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('jkn_mobile', 'bahasa_pasien', '')");
      $core->db()->pdo()->exec("INSERT INTO `mlite_settings` (`module`, `field`, `value`) VALUES ('jkn_mobile', 'cacat_fisik', '')");
    },
    'uninstall'     =>  function () use ($core) {
      $core->db()->pdo()->exec("DELETE FROM `mlite_settings` WHERE `module` = 'jkn_mobile'");
    }
];
