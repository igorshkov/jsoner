<?php

Class r221
{

    /*
     * TODO
     *      tests for uniqueness
     *      tests for existence
     *
     */

    private $jsoner;

    public function __construct($jsoner)
    {
        $this->$jsoner = $jsoner;
        $this->doTask();
        $this->checkUniquness();
    }

    private function doTask()
    {
        $regions = $this->jsoner->get();
        $codes = $this->codes();

        // add id and code properties
        $matches = 0;
        $newRegions = [];
        foreach($codes as $entry) {
            foreach($regions as $region) {
                if($entry['title']==$region->title) {
                    $newEntry = $region;
                    $newEntry->codes = $entry['codes'];
                    $newEntry->id = $entry['codes'][0];
                    $newRegions[] = $newEntry;
                    $matches++;
                    break;
                }
            }
        }

        sort($newRegions);

        // work with new regions
        $this->jsoner->set($newRegions);

        L::v('Creating new regions.. ', 'newregions.json');
        $this->jsoner->save('newregions.json');

        L::i('CODES: ', sizeof($regions));
        L::i('REGIONS: ', sizeof($codes));
        L::i('MATCHES: ', $matches);
    }

    private function tests()
    {
        // Test 1
        $a = $this->jsoner->getBy('id', 20);

        // Test 2
        $b = $this->jsoner->getById('title', 'Воронежская область');

        // Test 3

    }

    private function hasElement($name, $val)
    {

    }

    public function checkUniquness($name)
    {
        // all ids (just in case)
        $ids = [];
        foreach($this->newRegions as $region) {
            $ids[] = $region->id;
        }
        sort($ids);



        //$str = '';
        //foreach ($titles as $title) {
        //    $str .= '[\'codes\'=>[], \'title\'=>\''.$title.'\'], '."\n";
        //
        //}
        //
        //L::data($str);



        if($this->jsoner->isUnique('id')) {
            L::i('id', 'is unique');
        } else {
            L::e('id', 'is NOT unique');
        }
    }

    private function codes()
    {
        return [
            ['codes' => [22], 'title' => 'Алтайский край'],
            ['codes' => [28], 'title' => 'Амурская область'],
            ['codes' => [29], 'title' => 'Архангельская область'],
            ['codes' => [30], 'title' => 'Астраханская область'],
            ['codes' => [31], 'title' => 'Белгородская область'],
            ['codes' => [32], 'title' => 'Брянская область'],
            ['codes' => [33], 'title' => 'Владимирская область'],
            ['codes' => [34, 134], 'title' => 'Волгоградская область'],
            ['codes' => [35], 'title' => 'Вологодская область'],
            ['codes' => [36, 136], 'title' => 'Воронежская область'],
            ['codes' => [79], 'title' => 'Еврейская автономная область'],
            ['codes' => [37], 'title' => 'Ивановская область'],
            ['codes' => [6], 'title' => 'Ингушетия'],
            ['codes' => [38, 85, 138], 'title' => 'Иркутская область'],
            ['codes' => [7], 'title' => 'Кабардино-Балкарская Республика'],
            ['codes' => [39, 91], 'title' => 'Калининградская область'],
            ['codes' => [40], 'title' => 'Калужская область'],
            ['codes' => [41], 'title' => 'Камчатский край'],
            ['codes' => [9, 109], 'title' => 'Карачаево-Черкесская Республика'],
            ['codes' => [42, 142], 'title' => 'Кемеровская область'],
            ['codes' => [43], 'title' => 'Кировская область'],
            ['codes' => [44], 'title' => 'Костромская область'],
            ['codes' => [23, 93, 123], 'title' => 'Краснодарский край'],
            ['codes' => [24, 84, 88, 124], 'title' => 'Красноярский край'],
            ['codes' => [45], 'title' => 'Курганская область'],
            ['codes' => [46], 'title' => 'Курская область'],
            ['codes' => [47], 'title' => 'Ленинградская область'],
            ['codes' => [48], 'title' => 'Липецкая область'],
            ['codes' => [49], 'title' => 'Магаданская область'],
            ['codes' => [77, 97, 99, 197, 199, 777], 'title' => 'Москва'],
            ['codes' => [50, 90, 150, 750], 'title' => 'Московская область'],
            ['codes' => [51], 'title' => 'Мурманская область'],
            ['codes' => [83], 'title' => 'Ненецкий автономный округ (Архангельская область)'],
            ['codes' => [52, 152], 'title' => 'Нижегородская область'],
            ['codes' => [53], 'title' => 'Новгородская область'],
            ['codes' => [54, 154], 'title' => 'Новосибирская область'],
            ['codes' => [55], 'title' => 'Омская область'],
            ['codes' => [56], 'title' => 'Оренбургская область'],
            ['codes' => [57], 'title' => 'Орловская область'],
            ['codes' => [58], 'title' => 'Пензенская область'],
            ['codes' => [59, 81, 159], 'title' => 'Пермский край'],
            ['codes' => [25, 125], 'title' => 'Приморский край'],
            ['codes' => [60], 'title' => 'Псковская область'],
            ['codes' => [1, 101], 'title' => 'Республика Адыгея (Адыгея)'],
            ['codes' => [4], 'title' => 'Республика Алтай'],
            ['codes' => [2, 102], 'title' => 'Республика Башкортостан'],
            ['codes' => [3, 103], 'title' => 'Республика Бурятия'],
            ['codes' => [5], 'title' => 'Республика Дагестан'],
            ['codes' => [8], 'title' => 'Республика Калмыкия'],
            ['codes' => [10], 'title' => 'Республика Карелия'],
            ['codes' => [11], 'title' => 'Республика Коми'],
            ['codes' => [12], 'title' => 'Республика Марий Эл'],
            ['codes' => [13, 113], 'title' => 'Республика Мордовия'],
            ['codes' => [14], 'title' => 'Республика Саха (Якутия)'],
            ['codes' => [15], 'title' => 'Республика Северная Осетия-Алания'],
            ['codes' => [16, 116], 'title' => 'Республика Татарстан (Татарстан)'],
            ['codes' => [17], 'title' => 'Республика Тыва'],
            ['codes' => [19], 'title' => 'Республика Хакасия'],
            ['codes' => [61, 161], 'title' => 'Ростовская область'],
            ['codes' => [62], 'title' => 'Рязанская область'],
            ['codes' => [63, 163], 'title' => 'Самарская область'],
            ['codes' => [78, 98], 'title' => 'Санкт-Петербург'],
            ['codes' => [64, 164], 'title' => 'Саратовская область'],
            ['codes' => [65], 'title' => 'Сахалинская область'],
            ['codes' => [66, 96], 'title' => 'Свердловская область'],
            ['codes' => [67], 'title' => 'Смоленская область'],
            ['codes' => [26], 'title' => 'Ставропольский край'],
            ['codes' => [68], 'title' => 'Тамбовская область'],
            ['codes' => [69], 'title' => 'Тверская область'],
            ['codes' => [70], 'title' => 'Томская область'],
            ['codes' => [71], 'title' => 'Тульская область'],
            ['codes' => [72], 'title' => 'Тюменская область'],
            ['codes' => [18, 118], 'title' => 'Удмуртская Республика'],
            ['codes' => [73, 173], 'title' => 'Ульяновская область'],
            ['codes' => [27], 'title' => 'Хабаровский край'],
            ['codes' => [86], 'title' => 'Ханты-Мансийский автономный округ - Югра (Тюменская область)'],
            ['codes' => [74, 174], 'title' => 'Челябинская область'],
            ['codes' => [20, 95], 'title' => 'Чеченская республика'],
            ['codes' => [75, 80], 'title' => 'Читинская область'],
            ['codes' => [21, 121], 'title' => 'Чувашская Республика - Чувашия'],
            ['codes' => [87], 'title' => 'Чукотский автономный округ'],
            ['codes' => [89], 'title' => 'Ямало-Ненецкий автономный округ (Тюменская область)'],
            ['codes' => [76], 'title' => 'Ярославская область']
        ];
    }

}