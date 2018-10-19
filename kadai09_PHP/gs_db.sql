-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018 年 10 朁E19 日 19:47
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE IF NOT EXISTS `gs_an_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `naiyou` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL,
  `age` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `name`, `email`, `naiyou`, `indate`, `age`) VALUES
(7, 'Thomas', '', 'hello', '2018-09-22 16:08:27', 0),
(9, 'おおき', 'test', '内容テスト', '2018-09-22 17:18:24', 30),
(11, '面白い本', '', '面白い', '2018-09-22 18:24:56', 0),
(12, 'Iron', 'test', '内容テスト', '2018-09-22 18:25:06', 44),
(13, 'やまざき', 'test', '内容テスト', '2018-09-22 18:25:14', 30),
(15, 'やまざき', 'test', '内容テスト', '2018-09-22 19:56:37', 30),
(16, 'Yellow', 'test', '内容テスト', '2018-09-29 15:33:48', 22),
(17, 'Ken', 'test', '', '2018-09-29 17:25:36', 40);

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_like_table`
--

CREATE TABLE IF NOT EXISTS `gs_bm_like_table` (
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_like_table`
--

INSERT INTO `gs_bm_like_table` (`userid`, `postid`) VALUES
(4, 4),
(4, 4),
(2, 2),
(4, 3),
(4, 11),
(4, 13),
(4, 13),
(4, 4),
(4, 11),
(4, 12),
(4, 18),
(4, 14),
(4, 2),
(4, 2),
(4, 3),
(4, 3),
(6, 4),
(6, 2),
(6, 2),
(10, 4),
(10, 2),
(10, 3),
(9, 4),
(9, 3),
(9, 4),
(9, 14),
(9, 4),
(9, 4),
(9, 4),
(9, 4),
(9, 14),
(9, 14),
(9, 14),
(9, 12),
(9, 12),
(9, 3),
(9, 12),
(9, 4),
(9, 4),
(9, 4),
(9, 4),
(9, 4),
(9, 4),
(9, 4),
(9, 4),
(9, 2),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 4),
(11, 3),
(11, 2),
(11, 11),
(11, 11),
(11, 12),
(11, 2),
(11, 3),
(11, 3),
(11, 22),
(11, 22),
(11, 11),
(11, 20),
(11, 23),
(11, 24),
(6, 22),
(6, 23),
(10, 23),
(10, 22),
(10, 21),
(10, 3),
(10, 3),
(10, 12),
(10, 20),
(6, 21),
(6, 24),
(10, 24),
(10, 24),
(10, 24),
(10, 24),
(10, 24),
(10, 21),
(10, 11),
(10, 24),
(10, 24),
(10, 24),
(10, 24),
(10, 24),
(6, 26),
(6, 27);

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE IF NOT EXISTS `gs_bm_table` (
`postid` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `naiyou` text COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(255) NOT NULL,
  `indate` date NOT NULL,
  `photourl` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`postid`, `name`, `email`, `naiyou`, `userid`, `indate`, `photourl`) VALUES
(2, 'HTML', 'html.com', 'FUNNY', 11, '2018-09-23', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxAQEA8PDxIQDw8PDw8PDw8PEA8PDw8PFRUWFhURFRUYHSggGBolGxUVITEhJSkrLi4uFx8zODMtNygtLisBCgoKDg0OGhAQGisdHx0tLS0tLS0tLS0rLS0tLS0rLS0tLS0rKystLS0tLS0tLSstLS0tLS0tLSstLS0tKywrLf/AABEIALcBEwMBIgACEQEDEQH/xAAcAAABBQEBAQAAAAAAAAAAAAAAAQIDBAUGBwj/xAA7EAACAQMCBQMBBQUGBwAAAAAAAQIDERIEIQUTMVFhBhRBIhUycYGhQlKR4fAjYpKTseIHJlOCstHT/8QAGQEAAwEBAQAAAAAAAAAAAAAAAAECAwQF/8QALBEAAgIBAgYBAgYDAAAAAAAAAAECEQMSEwQUITFRkVJBQiIyU2Fx8BVDYv/aAAwDAQACEQMRAD8A8fEaHsa2bmYxxEsPuIADQsOsAAJYWwthUhgJYLD8RLAAlhLDrC2GAywWH2CwCGWCw+wWABlgsPsLYAGWCw+wqQCsZYV79l06bdEPURcQCxmIqRIojlAQrIlEcokqpj1TJbFqIFAVQLKpD1SJcidZVVMXllxUSRUCHMl5ChyxypF5UBl4ptO6a2tZ3/Eh5BKTfYqVEo/eeP4jHP6opfPdPdeCfU03K0oxla2LlOUoJL4Vv4FXU1MZpJ4tRV/pbav8q/V2+TPcs6YY01+5ZcEBQqWbbyg/Mpbv8dxQ1Mrl/wDoibCwthbHcIbYWw6wJAIbYWw6wYjAakPjEFElSAQywOI+wWHQEeIth9gsFAMsFh9gsFCGWEsSWCwUAywWJMQUQEMxFUSRRHqACsiUR6gTRpkkaRDZDkQRpkkaRZhRLENOZSmkZyyFKFInjQL9PTFmGlMJZjGWYy46cljpjWjpiRUEYPOZvKZkNITR0hpxpocsUYPM2Q8jOfpxq3mp0klHo4z6/wAbGZroxknOeMpOShGkqkZYS+bfSdHrNDp55OUFebTk4txcmul2iDRUI0U8bZOybSsrL7qS8FKb7nVjzRj+Jd/79bZzk3y3NRypzWyhJPZtJXe+yt5vuJS0/Pq3coxullJSSiorbZLe21jQq8Nm5uUpqcWkm6iym7Pp27j9fpIYPlxxklZRjLCLf95fJpfg7eZj0p9Wu/gzqvs4ScG6s3FtOWKs2uvyAQ4bG31NJ/Nun5bAVp/k1Sh+p/fRQSHR2/mk/wBGOSCx6pmIkFh9hbAAywth9gsOhDbD1EFElUQoTZHYGiXERxGKyNIVIfGI5RACJxEsTYiYgBHiGJLiKoCFZEojlAmjTJYUiWyHIgjTJoUizToFiFAylMxlkKkKBYp6ctRpoc5JdTBzb7GTk2Mp0C3Tooo1NfFdNyKXEZNbEPFORLhJmtZIkjWijn5amT+S3pZXInw9K2TLHRpy1XYq1NVIc0rEEmiIwXgUUiSNWTJIJshhJBLVJfIOD+iHpbLE4leckirqNejOrax/BpDh5PuawxM0K+oSM6tqSrOs2RNnVDAkdMcSRK6wEIhroRppQ6wWH4jlE1ouxmI5RJFAeoDFZCoC4k6gNxChWNjAdiSQiLiOhWR2CxJiFgoVkSQ5RHKJIojoLIsQUSxyxY0xMVkEaZLGiWadAt09MYTnRlKdFKnQLNPTlpUkuuxBX1sY7LdmNyl2MrcuxLGkkR1dRCPyZtfWSl4KzuzaPDN/mKWLyXq/Ef3SjUryfVjbBibxxRj2NVFLsNHxkJiLYpxKBzLWmr2KlhURLGmqJcEy/U1bIXqX1v8A+yqxLErBFAsaRNLUPuQyqtiWEsUsaRaSQyTGkmIYj0lENhLEriJiFBZHYB+IBQ7JVEkjAeoEkYhQiNQHKBPSSTTkskmm43ayXyrroIojAjUSNRLWJHiMVjYxFxJYxFxHQiHETEsYA4DoVldQJ4UxYQ3L2noXRMnRLlRDGgLGhubmn0N0Mr6XGzOTeV0YvJ1oq0NN0DVV409vkk1eowjZdWYlVuTbYY8Lm7l2FGGrqw1OqlPwitiTYCqB3Rgo9jfoitgGBZcBMCqCyvgGBYwDAKCyviGJYwEwCgsr4i4k/LDAVDsr4BiWMBMAoLKziI4lnARwFQ7K+I3Es4DXAVDsruIjiWHArayuqaTe9308fLJdJdRrqFhSN6yl+8v1Am4+R0zRjEcokkYj1EYiNRHYkqgOUQEyHEZh/XUtYDcChEcID1AlhTJVTGIrKmSOkWY0Sw6G1yXKhNmZTp7mxpqNotspxp7l6c+iXSyM8qb6Izn1NvhtsdzM4xqYraPW46lrMYOPdGNVTb3OXDwt5HKRlHH1tlWs3J3ZHgW+WJyz00qNyrgLyyzyxeWVQipyw5Zb5QvKGBS5YYF3khyQAoqmOVMuckXkiGUuWHLLyoByBAUOWDpmh7cocQ11KhFSm73bSULSbaauvFrickurKSbGcsR0ylT9RUG0nGcbtK7UbLy9zXmkouas0k5XTVmvx6EqcZdmNxa7mNxbUOlC8bZNpK/X8bGVquKSdOKTSnK7k432XwvBU1mqdSbqWUclay+CtJ9Dinmbbo6IwSXU1uFcQ3wqO6d3lJ/dsu/YqcXnerKz2Vrb3XT4KYhDm3HSylFJ2LcBAIKO+jAlUCSMCaNM6tRhRDGmOVMsxpkioj1C0lNUw5RoKgOjpytYtJRhRLcdOWYaY0KOl+hP8iZ5KJaM6npha0OkUaPLaXkhWnd7kxtu2RpZlukKqZre0D2T7GyaHpMh02JyDbWgfYfHh77F6kLSYPtxfbHQLh77D1w59h60Gk532w5aY6NcNfYeuGeA3ELSc0tN4F9r4OnXC/A5cMfYNxD0s5f2gvtPB1H2Y+wv2X4FuINJy/tA9r4Omq8PUIylLaMU5Sb6JLds4Tjnq2GDjomuYqmE5VI/dWLlko/K2km/i3kl5UilBs0qtFQi5TajGKu5PZJGXqOL0FSqVaclUVPC9r7uXRHM+oPVNTUQ5O3LdOlGpst6sHdzj2u7beDnozaTSbSlbJJuztur9zGXEeDWOHyaFTi1dyd6s2pu8km0t+qXZb2KVdq7UW3G+19r+bEVwOZtvubJUIXVxOqqapRk4wV9o7OV3d3ZSAE2h0ArYgCAAAAAAAAA9ThSLEKJFR1FN2tKLv0tJO5cjUildtJLq7mD4g3XDsIUCeGmH0pxLlKcSXxRfKsrQ0xPS0pepOPgtUkvBD4xFco/BQpaQu0dNb8Oxdp04lqnTiQ+NQuSfgz6mgT3QsOG+DYhFE9NII8ekqsXJMx4cL8E0OFeDag4k8ZR8Ff5BEvhGjDjwrwSx4Wjbi4+CaMo+B8+vJL4ajDjwtdiSPC/BuRqR8Eqkg55eSXhSMFcK8D48J8G6pIcpIOdXkW2jEXCvA9cL8GzmiHW6jClUnG14U5yV2krqLauHOryLbM37K8GfxPU6PTSUdRXpUZOnUqqNSai3Th96X5Hgfqv1dxJyqU5arURjKd5U83HdxjJS26bOL2dt9kclq9fWrNOtUqVZLK0qk5Tl9Tu93vu23+bOmM5SVilBRdHof8AxH9f0dZTqaPRxlylUTlXk0udGPaDV0srW3+OnbzRu4gFiABbCAAAAAAAKxAAAAAAAAAAAAAAktHu/wDD/MerJNZTSfVW2f6ncUdNRXSnDt91FuNGk0k4QaTvbFde5i8n7G6xLycDCpJdJ1V3tdbL8/P6iUZNO8J1VLvFNPv8M9KpRp/ux367Is0I049IxX4RSIeV/EtYo/I86oVtVf6Kurv82c73/wARoaatxPrCprenl/6y8HolKtFdkW6eqRjLJL4I2jCK+9nndLVcZ3xnrenzBPb8yalruO5LGesbv80oWvbzsej09Yi3T1iMnOXwj6NEo/OXs8zq6/1ArXlrOqtjQpeLXxX4dRlXiPqC28tclt0pRXyuy72/q56xDVIsU9UiNcv04+gaj85ezyqlr/UmSServbZOhRx+fFvh/p4NDTa31Pj0m/q61KOmjL4+Ntv5np1PURLEK8fBDc3/AK4+h/g+cvZ5zQ1fqd/sU/8AvhQX+ky97j1Kv2dG/wAI/wC872FeBPGrAzam/sj6DVBfV+zg6Wo9R3WUdD1+Yzvb8qhoU63Hsd/ZqVnZ4VLde3MOxjOHXYljUj4J25v7V6B5InC5+ov3tF/lT/8AoRxXqO7/ALbTfg6EcfytO/8AE9BVSI7OPce3P4r0ZucTgP8AmL/q6T/I3/8AMzOKaT1DVjOE675c4uEoUKOlUZRas19bv08nqMsH8/qVNVoaU4zV5JuMleMmmtvgFDIn+WPoalB9+h8s+p+F1NLX5dW7k4qom3T+pNtN/Q2uqa77GS1bYv8AF3efWd1GEWqkspXxvK3ZZN2Xkzz3Md6VZwZK1OgAALIABWIAAACoAHU6cpyjGKcpSajGMU5SlJuySS6u4tajODcZxlBpyi1KLi1KLs00/lPYbYMWA6GgLYAEIAAAAAAAHZx1JLDVGMqo9VitCFqZuR1hJHW+TBVcctQG2g1M6GOu8liOu8nMrUD1qg20GtnVUtf5LtDXd3ZHHUtVui1U1rbIljVkvIzqXxbfqSQ4x5OOnqmtxIa1lxxRoW4zuYca8k8ON+TgffMcuIPuVtRDWz0KPHPJLHja7nnS4i+49cSfcexENyR6NHjfn9SSPHfJ5wuJvuKuKPuGxEN1npK4++46PqB9zzdcVfcVcVfcXLoN1npa4/5HLj/k80XFn3F+1X3HsINxnT6/gvDazqSqUI5VOsk5Jx63x3tHq+hz3FvQ2jnh7eToLmXmm3P+zsk0m/m6b/Mh+1X3E+1X3HtIWtnD8b4LV0tRwmrwu8Kn7M4/D67PdbfBmnoWu1Ua1OVOdmpJrdJ2drXXk4TU6WUJuD3a7bpkThpLjKyABWhCCgAAABSTURgnaEs44weTi4PJxTlG3iTav82uRAAAAAAAAAAAAAAGnmKqhVyFzNCS1zA5pVzDMYi3zRVWKmYZjsKL9OsSx1BmqY5VBCo1OffYi5xUhVGyqCRNFznBzipGVxYyK1DLXOF9wVZ3SuRZjUhUX/cC+4M/mBzB6h0aHuQ9yZ/MDmD1BRo+5D3JncwOYGoKNL3Ie5M3mBzA1BRpe5GzrJpp/NzP5gcwWoKFWjj9W/Xp/dKVenjJr+DLnMEck+pDin2KTKLVhCzXjfdfCK+LM2qKTEAAEMAHKO1xoAAAAAAAAATXC4AUILhcAGAXDIAAQtwyAAsBymGYAAD6cyVPcAJZLJ6qvFFGewATjZMBuQXADU0DIMgAdgGQXEAAFyDIQBWAuQZCAFgLcLiAABcLgAWAklcZgACYx6ZFJbgAmCEAAJGAAAAf/9k='),
(3, 'PHP難しい', '', 'great', 10, '2018-09-23', 'https://imgc.allpostersimages.com/img/print/posters/%E3%82%A2%E3%83%B3-%E3%82%BB%E3%82%B7%E3%83%AB-sunset-at-anaehoomalu-beach-waikoloa-hawaii-usa_a-G-2494709-4990875.jpg'),
(4, 'JAPAN', 'japan.com', 'interesting', 10, '2018-09-23', 'http://www.discoveryinthedark.wales/__data/assets/image/0010/808957/105233-pano-square-740x740.jpg'),
(11, '面白い本', 'dummy.com', '面白い', 10, '2018-09-29', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVBba84tks96cWnf5hYIVOe9iLIsjvIflnb0imv_KQJCGPcrDB'),
(12, 'testbook', 'aaa', 'aaaa', 6, '2018-10-16', 'http://farm7.staticflickr.com/6144/5961609377_db6f09486b_b.jpg'),
(26, 'あれ', '', '', 6, '2018-10-19', 'https://i.redditmedia.com/fNbLDssntCIcrSnvyH6pr9JDCBO8t9EwgUM6ooj9lgo.jpg?w=1024&s=29af9a834ffd5e4d5fc4a7dfe8b5a81b'),
(27, 'りんご', '', '', 6, '2018-10-19', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE IF NOT EXISTS `gs_user_table` (
`userid` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL,
  `icon` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`userid`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`, `icon`) VALUES
(6, 'Kasai', 'kasai', 'kasai', 1, 0, 'https://graph.facebook.com/1193958894/picture?type=square'),
(7, 'Ken', 'Ken', 'Ken', 1, 0, ''),
(8, 'Hana', 'Hana', 'Hana', 1, 0, ''),
(9, 'Perry', 'perry', 'perry', 1, 0, 'https://upload.wikimedia.org/wikipedia/commons/8/8b/Matthew_Calbraith_Perry.jpg'),
(10, 'Naomi', 'naomi', 'naomi', 0, 0, 'https://www.moshimoshi-nippon.jp/wp/wp-content/uploads/2018/04/sub34.jpg'),
(11, 'Yamada', 'Yamada', 'Yamada', 1, 0, 'https://www.cinemacafe.net/imgs/thumb_h1/343855.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
 ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
 ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
MODIFY `postid` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
MODIFY `userid` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
