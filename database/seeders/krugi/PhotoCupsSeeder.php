<?php

namespace Database\Seeders\krugi;

use App\Models\Krugi\Cup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotoCupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        Cup::factory()
//        ->count(50)
//        // ->hasPosts(1)
//        ->create();

//        DB::table('cups')->query(db::raw("
        DB::select("
INSERT INTO `cups` (`id`, `name`, `lat`, `lon`, `opis`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `img7`, `img8`, `img9`, `img10`, `created_at`, `updated_at`, `deleted_at`) VALUES
(49, 'Боровский', NULL, NULL, NULL, '20220531.1653967243.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-30 22:20:43', '2022-05-30 22:20:43', NULL),
(51, 'Москва', '37.62445024233856', '55.75098903007436', NULL, '20220531.1653969773.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-30 23:02:53', '2022-05-30 23:02:53', NULL),
(54, 'Сургут', '73.39998359240714', '61.248076269121725', NULL, '20220531.1653970344.1.jpg', '20220531.1653970344.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-30 23:12:24', '2022-05-30 23:12:24', NULL),
(55, 'Испания, Порт Авентура', '1.159482112463031', '41.08762647987407', NULL, '20220531.1653970624.1.jpg', '20220531.1653970624.2.jpg', '20220531.1653970624.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-30 23:17:04', '2022-05-30 23:17:04', NULL),
(56, 'Благовещенская', '37.13592699999995', '45.05480176675356', NULL, '20220531.1653970692.1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-30 23:18:12', '2022-05-30 23:18:12', NULL),
(57, 'Анапа', '37.31357349999996', '44.921750788941914', NULL, '20220531.1653970873.1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-30 23:21:13', '2022-05-30 23:21:13', NULL),
(58, 'Адлер', '39.91231464019769', '43.44485479574147', NULL, '20220531.1653970937.1.jpg', '20220531.1653970937.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-30 23:22:17', '2022-05-30 23:22:17', NULL),
(59, 'New york', '-73.9740303676758', '40.70147373575982', NULL, '20220531.1653971051.1.jpg', '20220531.1653971051.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-30 23:24:11', '2022-05-30 23:24:11', NULL),
(60, 'Черное море, Сочи', '39.705941595337755', '43.596973905769445', NULL, '20220531.1653971155.1.jpg', '20220531.1653971155.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-30 23:25:55', '2022-05-30 23:25:55', NULL),
(61, 'Геленджик', '38.06530791015619', '44.578002656059695', NULL, '20220531.1653971317.1.jpg', '20220531.1653971317.2.jpg', '20220531.1653971317.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-30 23:28:37', '2022-05-30 23:28:37', NULL),
(62, 'Турция, Белек', '31.062368000000003', '36.85927659737266', NULL, '20220531.1653972368.1.jpg', '20220531.1653972368.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-30 23:46:08', '2022-05-30 23:46:08', NULL),
(63, 'Беларусь', '27.866195427734368', '53.97639588948373', NULL, '20220531.1653972481.1.jpg', '20220531.1653972481.2.jpg', '20220531.1653972481.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-30 23:48:02', '2022-05-30 23:48:02', NULL),
(64, 'Златоуст', '59.694061902099506', '55.17875439514438', NULL, '20220531.1653972539.1.jpg', '20220531.1653972539.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-30 23:48:59', '2022-05-30 23:48:59', NULL),
(65, 'Тюмень', '65.55207748747922', '57.17085565454986', NULL, '20220531.1653972655.1.jpg', '20220531.1653972655.2.jpg', '20220531.1653972655.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-30 23:50:55', '2022-05-30 23:50:55', NULL),
(66, 'Тюмень, Мост влюблённых', '65.52129851169816', '57.16393953095747', NULL, '20220531.1653972714.1.jpg', '20220531.1653972714.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-30 23:51:54', '2022-05-30 23:51:54', NULL),
(67, 'Ишим', '69.48168032012933', '56.1120734488558', NULL, '20220531.1653972837.1.jpg', '20220531.1653972837.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-30 23:53:57', '2022-05-30 23:53:57', NULL),
(68, 'Ишим', '69.48168032012933', '56.1120734488558', NULL, '20220531.1653972855.1.jpg', '20220531.1653972855.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-30 23:54:15', '2022-05-30 23:54:15', NULL),
(69, 'Пхукет, FantaSea', '98.40012365612792', '7.882083822685395', NULL, '20220531.1653973017.1.jpg', '20220531.1653973017.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-30 23:56:57', '2022-05-30 23:56:57', NULL),
(70, 'Новый Уренгой', '76.66307083068845', '66.08224608494653', NULL, '20220531.1653973096.1.jpg', '20220531.1653973096.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-30 23:58:16', '2022-05-30 23:58:16', NULL),
(71, 'Киров', '49.69341771898231', '58.60752105766506', NULL, '20220531.1653973182.1.jpg', '20220531.1653973182.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-30 23:59:42', '2022-05-30 23:59:42', NULL),
(72, 'Самара', '50.228240830757876', '53.23729694133052', NULL, '20220531.1653973247.1.jpg', '20220531.1653973247.2.jpg', '20220531.1653973247.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-31 00:00:47', '2022-05-31 00:00:47', NULL),
(73, 'Омск', '73.33095668617804', '54.923674143987775', NULL, '20220531.1654015540.1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-31 11:45:40', '2022-05-31 11:45:40', NULL),
(74, 'Нефтьюганск', '72.61220889183241', '61.08833969106429', NULL, '20220531.1654015654.1.jpg', '20220531.1654015654.2.jpg', '20220531.1654015654.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-31 11:47:34', '2022-05-31 11:47:34', NULL),
(75, 'Санкт-Петербург', '30.317163029653305', '59.93753768140959', NULL, '20220531.1654015721.1.jpg', '20220531.1654015721.2.jpg', '20220531.1654015721.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-31 11:48:41', '2022-05-31 11:48:41', NULL),
(76, 'Санкт-Петербург', '30.317163029653305', '59.93753768140959', NULL, '20220531.1654015778.1.jpg', '20220531.1654015778.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-31 11:49:38', '2022-05-31 11:49:38', NULL),
(77, 'Норвегия', '10.742884685302716', '59.916431721143866', NULL, '20220531.1654015990.1.jpg', '20220531.1654015990.2.jpg', '20220531.1654015990.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-31 11:53:11', '2022-05-31 11:53:11', NULL),
(78, 'Йошкар-Ола', '47.8711502272948', '56.632331178471034', NULL, '20220531.1654016784.1.jpg', '20220531.1654016784.2.jpg', '20220531.1654016784.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-31 12:06:24', '2022-05-31 12:06:24', NULL),
(79, 'Екатеринбург, Мед центр Эспераль', '60.61782421837947', '56.795650840621626', NULL, '20220601.1654055392.1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-31 22:49:52', '2022-05-31 22:49:52', NULL),
(80, 'Красноярск', '92.85208138756808', '56.01150856987356', NULL, '20220601.1654055795.1.jpg', '20220601.1654055795.2.jpg', '20220601.1654055795.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-31 22:56:35', '2022-05-31 22:56:35', NULL),
(81, 'Санкт-Петербург', '30.31084743286129', '59.93757368404912', NULL, '20220601.1654055932.1.jpg', '20220601.1654055932.2.jpg', '20220601.1654055932.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-31 22:58:52', '2022-05-31 22:58:52', NULL),
(82, 'Биробиджан', '132.93287308465568', '48.79189250468402', NULL, '20220601.1654056012.1.jpg', '20220601.1654056012.2.jpg', '20220601.1654056012.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-31 23:00:12', '2022-05-31 23:00:12', NULL),
(83, 'Турция, Аланья', '32.00431331199331', '36.54870008993639', NULL, '20220601.1654056097.1.jpg', '20220601.1654056097.2.jpg', '20220601.1654056097.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-31 23:01:37', '2022-05-31 23:01:37', NULL),
(84, 'Тайланд', '98.39063936505124', '7.879345189222465', NULL, '20220601.1654056163.1.jpg', '20220601.1654056163.2.jpg', '20220601.1654056163.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-31 23:02:43', '2022-05-31 23:02:43', NULL),
(85, 'Забайкальский край', '113.57775131249997', '52.152703180275786', NULL, '20220601.1654056245.1.jpg', '20220601.1654056245.2.jpg', '20220601.1654056245.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-31 23:04:05', '2022-05-31 23:04:05', NULL),
(86, 'Калининград', '20.499034722412077', '54.69438802686328', NULL, '20220601.1654056313.1.jpg', '20220601.1654056313.2.jpg', '20220601.1654056313.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-31 23:05:13', '2022-05-31 23:05:13', NULL),
(87, 'Калининград (Кенигсберг)', '20.517059166992144', '54.71903985639037', NULL, '20220601.1654056390.1.jpg', '20220601.1654056390.2.jpg', '20220601.1654056390.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-31 23:06:30', '2022-05-31 23:06:30', NULL),
(88, 'Нефтеюганск', '72.6109349380442', '61.09327930362542', NULL, '20220601.1654056446.1.jpg', '20220601.1654056446.2.jpg', '20220601.1654056446.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-31 23:07:26', '2022-05-31 23:07:26', NULL),
(89, 'Лондонский мост', '-0.0885160622000258', '51.50614990279615', NULL, '20220601.1654058720.1.jpg', '20220601.1654058720.2.jpg', '20220601.1654058720.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-31 23:45:20', '2022-05-31 23:45:20', NULL),
(90, 'Греция, о. Крит', '24.764334070312497', '35.207002695235516', NULL, '20220601.1654058851.1.jpg', '20220601.1654058851.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-31 23:47:31', '2022-05-31 23:47:31', NULL),
(91, 'Греция, Ионические острова', '19.875409999999953', '39.59174210125389', NULL, '20220601.1654059066.1.jpg', '20220601.1654059066.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-31 23:51:06', '2022-05-31 23:51:06', NULL),
(92, 'Красноуфимск', '57.774884683773855', '56.61779098965808', NULL, '20220601.1654059181.1.jpg', '20220601.1654059181.2.jpg', '20220601.1654059181.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-31 23:53:01', '2022-05-31 23:53:01', NULL),
(93, 'Греция ост. Родос', '28.223809708724957', '36.4397502513445', NULL, '20220601.1654059634.1.jpg', '20220601.1654059634.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 00:00:34', '2022-06-01 00:00:34', NULL),
(94, 'Псков', '28.33838945751952', '57.81815321679329', NULL, '20220601.1654059723.1.jpg', '20220601.1654059723.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 00:02:03', '2022-06-01 00:02:03', NULL),
(95, 'Камчатка', '159.08863659844454', '56.55244877049187', NULL, '20220601.1654059900.1.jpg', '20220601.1654059900.2.jpg', '20220601.1654059900.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 00:05:00', '2022-06-01 00:05:00', NULL),
(96, 'Курск', '36.18087263589786', '51.736624170527435', NULL, '20220601.1654060027.1.jpg', '20220601.1654060027.2.jpg', '20220601.1654060027.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 00:07:07', '2022-06-01 00:07:07', NULL),
(97, 'Турция, Аланья', '32.00259841259765', '36.54970799933865', NULL, '20220601.1654060126.1.jpg', '20220601.1654060126.2.jpg', '20220601.1654060126.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 00:08:46', '2022-06-01 00:08:46', NULL),
(98, 'Геленджик', '38.07000501389558', '44.57294913801005', NULL, '20220601.1654060212.1.jpg', '20220601.1654060212.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 00:10:12', '2022-06-01 00:10:12', NULL),
(99, 'Дубай, Башня Халифы', '55.274236772570454', '25.19726930703655', NULL, '20220601.1654060619.1.jpg', '20220601.1654060619.2.jpg', '20220601.1654060619.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 00:16:59', '2022-06-01 00:16:59', NULL),
(100, 'Воронеж', '39.178035533203094', '51.6754978452277', NULL, '20220601.1654060873.1.jpg', '20220601.1654060873.2.jpg', '20220601.1654060873.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 00:21:13', '2022-06-01 00:21:13', NULL),
(101, 'Кучугуры', '36.951704165321964', '45.409568811329194', NULL, '20220601.1654061438.1.jpg', '20220601.1654061438.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 00:30:38', '2022-06-01 00:30:38', NULL),
(102, 'Азовское море', '34.88086935852906', '45.9091818401574', NULL, '20220601.1654061508.1.jpg', '20220601.1654061508.2.jpg', '20220601.1654061508.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 00:31:48', '2022-06-01 00:31:48', NULL),
(103, 'Канарские острова, Тенерифе', '-16.63252786564966', '28.272191392130296', NULL, '20220601.1654061633.1.jpg', '20220601.1654061633.2.jpg', '20220601.1654061633.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 00:33:53', '2022-06-01 00:33:53', NULL),
(104, 'Чёрное море', '39.73316294824221', '43.59619210457996', NULL, '20220601.1654061796.1.jpg', '20220601.1654061796.2.jpg', '20220601.1654061796.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 00:36:36', '2022-06-01 00:36:36', NULL),
(105, 'Екатеринбург', '60.60436694834615', '56.856376696831376', NULL, '20220601.1654061849.1.jpg', '20220601.1654061849.2.jpg', '20220601.1654061849.3.jpg', '20220601.1654061849.4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 00:37:29', '2022-06-01 00:37:29', NULL),
(106, 'Оренбург', '55.082376239731296', '51.761186680899755', NULL, '20220601.1654061904.1.jpg', '20220601.1654061904.2.jpg', '20220601.1654061904.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 00:38:24', '2022-06-01 00:38:24', NULL),
(107, 'Нижневартовск', '76.57385570966538', '60.94512267332759', NULL, '20220601.1654061952.1.jpg', '20220601.1654061952.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 00:39:13', '2022-06-01 00:39:13', NULL),
(108, 'Туниис', '10.17102721874997', '36.82238234423743', NULL, '20220601.1654062003.1.jpg', '20220601.1654062003.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 00:40:03', '2022-06-01 00:40:03', NULL),
(109, 'Новосибирск', NULL, NULL, NULL, '20220601.1654101839.1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 11:43:59', '2022-06-01 11:43:59', NULL),
(110, 'Испания, Торревьеха', NULL, NULL, NULL, '20220601.1654101944.1.jpg', '20220601.1654101944.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 11:45:44', '2022-06-01 11:45:44', NULL),
(111, 'Ишим', NULL, NULL, NULL, '20220601.1654102063.1.jpg', '20220601.1654102063.2.jpg', '20220601.1654102063.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 11:47:43', '2022-06-01 11:47:43', NULL),
(112, 'Вьетнам, ХаНой', NULL, NULL, NULL, '20220601.1654119688.1.jpg', '20220601.1654119688.2.jpg', '20220601.1654119688.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 16:41:28', '2022-06-01 16:41:28', NULL),
(113, 'Пермь', NULL, NULL, NULL, '20220601.1654119724.1.jpg', '20220601.1654119724.2.jpg', '20220601.1654119724.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 16:42:04', '2022-06-01 16:42:04', NULL),
(114, 'Кронштат', NULL, NULL, NULL, '20220601.1654119864.1.jpg', '20220601.1654119864.2.jpg', '20220601.1654119864.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 16:44:24', '2022-06-01 16:44:24', NULL),
(115, 'Казань', NULL, NULL, NULL, '20220601.1654121868.1.jpg', '20220601.1654121868.2.jpg', '20220601.1654121868.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:17:48', '2022-06-01 17:17:48', NULL),
(116, 'Красноярск', NULL, NULL, NULL, '20220601.1654121888.1.jpg', '20220601.1654121888.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:18:08', '2022-06-01 17:18:08', NULL),
(117, 'Сочи', NULL, NULL, NULL, '20220601.1654121907.1.jpg', '20220601.1654121907.2.jpg', '20220601.1654121907.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:18:27', '2022-06-01 17:18:27', NULL),
(118, 'Китай, Гуанджоу', NULL, NULL, NULL, '20220601.1654121929.1.jpg', '20220601.1654121929.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:18:49', '2022-06-01 17:18:49', NULL),
(119, 'Москва', NULL, NULL, NULL, '20220601.1654121952.1.jpg', '20220601.1654121952.2.jpg', '20220601.1654121952.3.jpg', '20220601.1654121952.4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:19:12', '2022-06-01 17:19:12', NULL),
(120, 'Курган', NULL, NULL, NULL, '20220601.1654121974.1.jpg', '20220601.1654121974.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:19:34', '2022-06-01 17:19:34', NULL),
(121, 'Москва', NULL, NULL, NULL, '20220601.1654121991.1.jpg', '20220601.1654121991.2.jpg', '20220601.1654121991.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:19:51', '2022-06-01 17:19:51', NULL),
(122, 'Горный Алтай', NULL, NULL, NULL, '20220601.1654122014.1.jpg', '20220601.1654122014.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:20:14', '2022-06-01 17:20:14', NULL),
(123, 'Челябинск', NULL, NULL, NULL, '20220601.1654122032.1.jpg', '20220601.1654122032.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:20:32', '2022-06-01 17:20:32', NULL),
(124, 'Екатеринбург', NULL, NULL, NULL, '20220601.1654122050.1.jpg', '20220601.1654122050.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:20:50', '2022-06-01 17:20:50', NULL),
(125, 'Египет', NULL, NULL, NULL, '20220601.1654122076.1.jpg', '20220601.1654122076.2.jpg', '20220601.1654122076.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:21:16', '2022-06-01 17:21:16', NULL),
(126, 'Черное море', NULL, NULL, NULL, '20220601.1654122105.1.jpg', '20220601.1654122105.2.jpg', '20220601.1654122105.3.jpg', '20220601.1654122105.4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:21:45', '2022-06-01 17:21:45', NULL),
(127, 'Ачит', NULL, NULL, NULL, '20220601.1654122121.1.jpg', '20220601.1654122121.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:22:01', '2022-06-01 17:22:01', NULL),
(128, 'Сургут', NULL, NULL, NULL, '20220601.1654122135.1.jpg', '20220601.1654122135.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:22:15', '2022-06-01 17:22:15', NULL),
(129, 'Египет', NULL, NULL, NULL, '20220601.1654122151.1.jpg', '20220601.1654122151.2.jpg', '20220601.1654122151.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:22:31', '2022-06-01 17:22:31', NULL),
(130, 'Кипр', NULL, NULL, NULL, '20220601.1654122169.1.jpg', '20220601.1654122169.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:22:49', '2022-06-01 17:22:49', NULL),
(131, 'Ессентуки', NULL, NULL, NULL, '20220601.1654122192.1.jpg', '20220601.1654122192.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:23:12', '2022-06-01 17:23:12', NULL),
(132, 'Санкт-Петербург', NULL, NULL, NULL, '20220601.1654122217.1.jpg', '20220601.1654122217.2.jpg', '20220601.1654122217.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:23:37', '2022-06-01 17:23:37', NULL),
(133, 'Омск', NULL, NULL, NULL, '20220601.1654122233.1.jpg', '20220601.1654122233.2.jpg', '20220601.1654122233.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:23:53', '2022-06-01 17:23:53', NULL),
(134, 'Ачинск', NULL, NULL, NULL, '20220601.1654122254.1.jpg', '20220601.1654122254.2.jpg', '20220601.1654122254.3.jpg', '20220601.1654122254.4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:24:14', '2022-06-01 17:24:14', NULL),
(135, 'Петергоф', NULL, NULL, NULL, '20220601.1654122274.1.jpg', '20220601.1654122274.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:24:34', '2022-06-01 17:24:34', NULL),
(136, 'Магнитогорск', NULL, NULL, NULL, '20220601.1654122295.1.jpg', '20220601.1654122295.2.jpg', '20220601.1654122295.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:24:55', '2022-06-01 17:24:55', NULL),
(137, 'Челябинск', NULL, NULL, NULL, '20220601.1654122310.1.jpg', '20220601.1654122310.2.jpg', '20220601.1654122310.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:25:10', '2022-06-01 17:25:10', NULL),
(138, 'Симферополь', NULL, NULL, NULL, '20220601.1654122330.1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:25:30', '2022-06-01 17:25:30', NULL),
(139, 'ХантыМансийск', NULL, NULL, NULL, '20220601.1654122348.1.jpg', '20220601.1654122348.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:25:48', '2022-06-01 17:25:48', NULL),
(140, 'Казань', NULL, NULL, NULL, '20220601.1654122365.1.jpg', '20220601.1654122365.2.jpg', '20220601.1654122365.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:26:05', '2022-06-01 17:26:05', NULL),
(141, 'Дубай', NULL, NULL, NULL, '20220601.1654122376.1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:26:16', '2022-06-01 17:26:16', NULL),
(142, 'Тольяти', NULL, NULL, NULL, '20220601.1654122395.1.jpg', '20220601.1654122395.2.jpg', '20220601.1654122395.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:26:35', '2022-06-01 17:26:35', NULL),
(143, 'Приозёрск', NULL, NULL, NULL, '20220601.1654122412.1.jpg', '20220601.1654122412.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:26:52', '2022-06-01 17:26:52', NULL),
(144, 'Уфа', NULL, NULL, NULL, '20220601.1654122432.1.jpg', '20220601.1654122432.2.jpg', '20220601.1654122432.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:27:12', '2022-06-01 17:27:12', NULL),
(145, 'Лондон', NULL, NULL, NULL, '20220601.1654122447.1.jpg', '20220601.1654122447.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:27:27', '2022-06-01 17:27:27', NULL),
(146, 'Тюмень, Царская улица', NULL, NULL, NULL, '20220601.1654122470.1.jpg', '20220601.1654122470.2.jpg', '20220601.1654122470.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:27:50', '2022-06-01 17:27:50', NULL),
(147, 'Солнечная долина (горнолыжка)', NULL, NULL, NULL, '20220601.1654122496.1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:28:17', '2022-06-01 17:28:17', NULL),
(148, 'Сочи', NULL, NULL, NULL, '20220601.1654122526.1.jpg', '20220601.1654122526.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:28:46', '2022-06-01 17:28:46', NULL),
(149, 'Абхазия, Пицунда', NULL, NULL, NULL, '20220601.1654122553.1.jpg', '20220601.1654122553.2.jpg', '20220601.1654122553.3.jpg', '20220601.1654122553.4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:29:13', '2022-06-01 17:29:13', NULL),
(150, 'Екатеринбург', NULL, NULL, NULL, '20220601.1654122568.1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:29:28', '2022-06-01 17:29:28', NULL),
(151, 'Крым', NULL, NULL, NULL, '20220601.1654122581.1.jpg', '20220601.1654122581.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:29:41', '2022-06-01 17:29:41', NULL),
(152, 'Евпатория', NULL, NULL, NULL, '20220601.1654122599.1.jpg', '20220601.1654122599.2.jpg', '20220601.1654122599.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:29:59', '2022-06-01 17:29:59', NULL),
(153, 'Волгоград', NULL, NULL, NULL, '20220601.1654122621.1.jpg', '20220601.1654122621.2.jpg', '20220601.1654122621.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:30:21', '2022-06-01 17:30:21', NULL),
(154, 'Алушта', NULL, NULL, NULL, '20220601.1654122642.1.jpg', '20220601.1654122642.2.jpg', '20220601.1654122642.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:30:42', '2022-06-01 17:30:42', NULL),
(155, 'Москва', NULL, NULL, NULL, '20220601.1654122658.1.jpg', '20220601.1654122658.2.jpg', '20220601.1654122658.3.jpg', '20220601.1654122658.4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:30:58', '2022-06-01 17:30:58', NULL),
(156, 'Ростов на дону', NULL, NULL, NULL, '20220601.1654122680.1.jpg', '20220601.1654122680.2.jpg', '20220601.1654122680.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:31:20', '2022-06-01 17:31:20', NULL),
(157, 'Кунгур', NULL, NULL, NULL, '20220601.1654122700.1.jpg', '20220601.1654122700.2.jpg', '20220601.1654122700.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:31:40', '2022-06-01 17:31:40', NULL),
(158, 'Алушта', NULL, NULL, NULL, '20220601.1654122731.1.jpg', '20220601.1654122731.2.jpg', '20220601.1654122731.3.jpg', '20220601.1654122731.4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:32:11', '2022-06-01 17:32:11', NULL),
(159, 'Турция', NULL, NULL, NULL, '20220601.1654122745.1.jpg', '20220601.1654122745.2.jpg', '20220601.1654122745.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:32:25', '2022-06-01 17:32:25', NULL),
(160, 'Киров', NULL, NULL, NULL, '20220601.1654122759.1.jpg', '20220601.1654122759.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:32:39', '2022-06-01 17:32:39', NULL),
(161, 'Иремель (гора)', NULL, NULL, NULL, '20220601.1654122778.1.jpg', '20220601.1654122778.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:32:58', '2022-06-01 17:32:58', NULL),
(162, 'Вятские поляны', NULL, NULL, NULL, '20220601.1654122804.1.jpg', '20220601.1654122804.2.jpg', '20220601.1654122804.3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:33:24', '2022-06-01 17:33:24', NULL),
(163, 'Нижний Тагил', NULL, NULL, NULL, '20220601.1654122821.1.jpg', '20220601.1654122821.2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01 17:33:41', '2022-06-01 17:33:41', NULL);
");

    }
}