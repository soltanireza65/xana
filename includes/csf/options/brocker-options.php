<?php if (!defined('ABSPATH')) {
  die;
}

$prefix_brocker_options = '_prefix_brocker_options';

CSF::createMetabox($prefix_brocker_options, array(
  'title'              => 'تنظیمات اختصاصی زانا',
  'post_type'          => 'brocker',
  'data_type'          => 'serialize',
  'context'            => 'advanced',
  'priority'           => 'default',
  'exclude_post_types' => array(),
  'page_templates'     => '',
  'post_formats'       => '',
  'show_restore'       => false,
  'enqueue_webfont'    => true,
  'async_webfont'      => false,
  'output_css'         => true,
  'nav'                => 'normal',
  'theme'              => 'dark',
  'class'              => '',
));


CSF::createSection($prefix_brocker_options, array(
  'title'  => 'تنظیمات کارگزاری',
  // 'icon'   => 'fas fa-rocket',
  'fields' => [
    ['id'    => 'onlineAuthentication', 'type'  => 'switcher', 'title' => 'احراز هویت آنلاین', "default" => false],
    ['id'    => 'automaticInitialSupply', 'type'  => 'switcher', 'title' => 'عرضه اولیه اتوماتیک', "default" => false],
    ['id'    => 'credit', 'type'  => 'switcher', 'title' => 'اعتبار', "default" => false],
    ['id'    => 'customerClub', 'type'  => 'switcher', 'title' => 'باشگاه مشتریان', "default" => false],
    ['id'    => 'interestOnTheBalance', 'type'  => 'switcher', 'title' => 'سود روی مانده', "default" => false],
    ['id'    => 'learningAcademy', 'type'  => 'switcher', 'title' => 'تغییر آنلاین کارگزار ناظر', "default" => false],
    ['id'    => 'onlineChangeOfSupervisorBroker', 'type'  => 'switcher', 'title' => 'تغییر آنلاین کارگزار ناظر', "default" => false],
    ['id'    => 'numberOfBranches', 'type'  => 'number', 'title' => 'تعداد شعب', "default" => 0],
    ['id'    => 'phone', 'type'  => 'text', 'title' => 'تلفن اختصاصی', "default" => ""],
    ['id'    => 'registerUri', 'type'  => 'text', 'title' => 'لینک ثبت نام', "default" => ""],
  ]
));

add_action('rest_api_init', 'xana_add_brocker_meta_rest');
function xana_add_brocker_meta_rest() {
  register_rest_field(
    'brocker',
    'brocker_meta',
    [
      'get_callback'      => 'brocker_meta_callback',
      'update_callback'   => null,
      'schema'            => null,
    ]
  );
}
function brocker_meta_callback($brocker, $field_name, $request) {
  $meta = get_post_meta($brocker['id'], '_prefix_brocker_options', true);
  return [
    "onlineAuthentication"            => (bool) $meta['onlineAuthentication'],
    "automaticInitialSupply"          => (bool) $meta['automaticInitialSupply'],
    "credit"                          => (bool) $meta['credit'],
    "customerClub"                    => (bool) $meta['customerClub'],
    "interestOnTheBalance"            => (bool) $meta['interestOnTheBalance'],
    "learningAcademy"                 => (bool) $meta['learningAcademy'],
    "onlineChangeOfSupervisorBroker"  => (bool) $meta['onlineChangeOfSupervisorBroker'],
    "numberOfBranches"                => (int) $meta['numberOfBranches'],
    "phone"                           => $meta['phone'],
    "registerUri"                     => $meta['registerUri'],
  ];
}
