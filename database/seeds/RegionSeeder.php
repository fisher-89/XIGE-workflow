<?php

use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = '[
        {
            "id": "110000",
            "name": "北京市",
            "parent_id": "0",
            "level": "1",
            "full_name": "北京市"
        },
        {
            "id": "110100",
            "name": "市辖区",
            "parent_id": "110000",
            "level": "2",
            "full_name": "北京市-市辖区"
        },
        {
            "id": "110101",
            "name": "东城区",
            "parent_id": "110100",
            "level": "3",
            "full_name": "北京市-市辖区-东城区"
        },
        {
            "id": "110102",
            "name": "西城区",
            "parent_id": "110100",
            "level": "3",
            "full_name": "北京市-市辖区-西城区"
        },
        {
            "id": "110105",
            "name": "朝阳区",
            "parent_id": "110100",
            "level": "3",
            "full_name": "北京市-市辖区-朝阳区"
        },
        {
            "id": "110106",
            "name": "丰台区",
            "parent_id": "110100",
            "level": "3",
            "full_name": "北京市-市辖区-丰台区"
        },
        {
            "id": "110107",
            "name": "石景山区",
            "parent_id": "110100",
            "level": "3",
            "full_name": "北京市-市辖区-石景山区"
        },
        {
            "id": "110108",
            "name": "海淀区",
            "parent_id": "110100",
            "level": "3",
            "full_name": "北京市-市辖区-海淀区"
        },
        {
            "id": "110109",
            "name": "门头沟区",
            "parent_id": "110100",
            "level": "3",
            "full_name": "北京市-市辖区-门头沟区"
        },
        {
            "id": "110111",
            "name": "房山区",
            "parent_id": "110100",
            "level": "3",
            "full_name": "北京市-市辖区-房山区"
        },
        {
            "id": "110112",
            "name": "通州区",
            "parent_id": "110100",
            "level": "3",
            "full_name": "北京市-市辖区-通州区"
        },
        {
            "id": "110113",
            "name": "顺义区",
            "parent_id": "110100",
            "level": "3",
            "full_name": "北京市-市辖区-顺义区"
        },
        {
            "id": "110114",
            "name": "昌平区",
            "parent_id": "110100",
            "level": "3",
            "full_name": "北京市-市辖区-昌平区"
        },
        {
            "id": "110115",
            "name": "大兴区",
            "parent_id": "110100",
            "level": "3",
            "full_name": "北京市-市辖区-大兴区"
        },
        {
            "id": "110116",
            "name": "怀柔区",
            "parent_id": "110100",
            "level": "3",
            "full_name": "北京市-市辖区-怀柔区"
        },
        {
            "id": "110117",
            "name": "平谷区",
            "parent_id": "110100",
            "level": "3",
            "full_name": "北京市-市辖区-平谷区"
        },
        {
            "id": "110200",
            "name": "县",
            "parent_id": "110000",
            "level": "2",
            "full_name": "北京市-县"
        },
        {
            "id": "110228",
            "name": "密云县",
            "parent_id": "110200",
            "level": "3",
            "full_name": "北京市-县-密云县"
        },
        {
            "id": "110229",
            "name": "延庆县",
            "parent_id": "110200",
            "level": "3",
            "full_name": "北京市-县-延庆县"
        },
        {
            "id": "120000",
            "name": "天津市",
            "parent_id": "0",
            "level": "1",
            "full_name": "天津市"
        },
        {
            "id": "120100",
            "name": "市辖区",
            "parent_id": "120000",
            "level": "2",
            "full_name": "天津市-市辖区"
        },
        {
            "id": "120101",
            "name": "和平区",
            "parent_id": "120100",
            "level": "3",
            "full_name": "天津市-市辖区-和平区"
        },
        {
            "id": "120102",
            "name": "河东区",
            "parent_id": "120100",
            "level": "3",
            "full_name": "天津市-市辖区-河东区"
        },
        {
            "id": "120103",
            "name": "河西区",
            "parent_id": "120100",
            "level": "3",
            "full_name": "天津市-市辖区-河西区"
        },
        {
            "id": "120104",
            "name": "南开区",
            "parent_id": "120100",
            "level": "3",
            "full_name": "天津市-市辖区-南开区"
        },
        {
            "id": "120105",
            "name": "河北区",
            "parent_id": "120100",
            "level": "3",
            "full_name": "天津市-市辖区-河北区"
        },
        {
            "id": "120106",
            "name": "红桥区",
            "parent_id": "120100",
            "level": "3",
            "full_name": "天津市-市辖区-红桥区"
        },
        {
            "id": "120110",
            "name": "东丽区",
            "parent_id": "120100",
            "level": "3",
            "full_name": "天津市-市辖区-东丽区"
        },
        {
            "id": "120111",
            "name": "西青区",
            "parent_id": "120100",
            "level": "3",
            "full_name": "天津市-市辖区-西青区"
        },
        {
            "id": "120112",
            "name": "津南区",
            "parent_id": "120100",
            "level": "3",
            "full_name": "天津市-市辖区-津南区"
        },
        {
            "id": "120113",
            "name": "北辰区",
            "parent_id": "120100",
            "level": "3",
            "full_name": "天津市-市辖区-北辰区"
        },
        {
            "id": "120114",
            "name": "武清区",
            "parent_id": "120100",
            "level": "3",
            "full_name": "天津市-市辖区-武清区"
        },
        {
            "id": "120115",
            "name": "宝坻区",
            "parent_id": "120100",
            "level": "3",
            "full_name": "天津市-市辖区-宝坻区"
        },
        {
            "id": "120116",
            "name": "滨海新区",
            "parent_id": "120100",
            "level": "3",
            "full_name": "天津市-市辖区-滨海新区"
        },
        {
            "id": "120117",
            "name": "宁河区",
            "parent_id": "120100",
            "level": "3",
            "full_name": "天津市-市辖区-宁河区"
        },
        {
            "id": "120118",
            "name": "静海区",
            "parent_id": "120100",
            "level": "3",
            "full_name": "天津市-市辖区-静海区"
        },
        {
            "id": "120200",
            "name": "县",
            "parent_id": "120000",
            "level": "2",
            "full_name": "天津市-县"
        },
        {
            "id": "120225",
            "name": "蓟县",
            "parent_id": "120200",
            "level": "3",
            "full_name": "天津市-县-蓟县"
        },
        {
            "id": "130000",
            "name": "河北省",
            "parent_id": "0",
            "level": "1",
            "full_name": "河北省"
        },
        {
            "id": "130100",
            "name": "石家庄市",
            "parent_id": "130000",
            "level": "2",
            "full_name": "河北省-石家庄市"
        },
        {
            "id": "130101",
            "name": "市辖区",
            "parent_id": "130100",
            "level": "3",
            "full_name": "河北省-石家庄市-市辖区"
        },
        {
            "id": "130102",
            "name": "长安区",
            "parent_id": "130100",
            "level": "3",
            "full_name": "河北省-石家庄市-长安区"
        },
        {
            "id": "130104",
            "name": "桥西区",
            "parent_id": "130100",
            "level": "3",
            "full_name": "河北省-石家庄市-桥西区"
        },
        {
            "id": "130105",
            "name": "新华区",
            "parent_id": "130100",
            "level": "3",
            "full_name": "河北省-石家庄市-新华区"
        },
        {
            "id": "130107",
            "name": "井陉矿区",
            "parent_id": "130100",
            "level": "3",
            "full_name": "河北省-石家庄市-井陉矿区"
        },
        {
            "id": "130108",
            "name": "裕华区",
            "parent_id": "130100",
            "level": "3",
            "full_name": "河北省-石家庄市-裕华区"
        },
        {
            "id": "130109",
            "name": "藁城区",
            "parent_id": "130100",
            "level": "3",
            "full_name": "河北省-石家庄市-藁城区"
        },
        {
            "id": "130110",
            "name": "鹿泉区",
            "parent_id": "130100",
            "level": "3",
            "full_name": "河北省-石家庄市-鹿泉区"
        },
        {
            "id": "130111",
            "name": "栾城区",
            "parent_id": "130100",
            "level": "3",
            "full_name": "河北省-石家庄市-栾城区"
        },
        {
            "id": "130121",
            "name": "井陉县",
            "parent_id": "130100",
            "level": "3",
            "full_name": "河北省-石家庄市-井陉县"
        },
        {
            "id": "130123",
            "name": "正定县",
            "parent_id": "130100",
            "level": "3",
            "full_name": "河北省-石家庄市-正定县"
        },
        {
            "id": "130125",
            "name": "行唐县",
            "parent_id": "130100",
            "level": "3",
            "full_name": "河北省-石家庄市-行唐县"
        },
        {
            "id": "130126",
            "name": "灵寿县",
            "parent_id": "130100",
            "level": "3",
            "full_name": "河北省-石家庄市-灵寿县"
        },
        {
            "id": "130127",
            "name": "高邑县",
            "parent_id": "130100",
            "level": "3",
            "full_name": "河北省-石家庄市-高邑县"
        },
        {
            "id": "130128",
            "name": "深泽县",
            "parent_id": "130100",
            "level": "3",
            "full_name": "河北省-石家庄市-深泽县"
        },
        {
            "id": "130129",
            "name": "赞皇县",
            "parent_id": "130100",
            "level": "3",
            "full_name": "河北省-石家庄市-赞皇县"
        },
        {
            "id": "130130",
            "name": "无极县",
            "parent_id": "130100",
            "level": "3",
            "full_name": "河北省-石家庄市-无极县"
        },
        {
            "id": "130131",
            "name": "平山县",
            "parent_id": "130100",
            "level": "3",
            "full_name": "河北省-石家庄市-平山县"
        },
        {
            "id": "130132",
            "name": "元氏县",
            "parent_id": "130100",
            "level": "3",
            "full_name": "河北省-石家庄市-元氏县"
        },
        {
            "id": "130133",
            "name": "赵县",
            "parent_id": "130100",
            "level": "3",
            "full_name": "河北省-石家庄市-赵县"
        },
        {
            "id": "130183",
            "name": "晋州市",
            "parent_id": "130100",
            "level": "3",
            "full_name": "河北省-石家庄市-晋州市"
        },
        {
            "id": "130184",
            "name": "新乐市",
            "parent_id": "130100",
            "level": "3",
            "full_name": "河北省-石家庄市-新乐市"
        },
        {
            "id": "130200",
            "name": "唐山市",
            "parent_id": "130000",
            "level": "2",
            "full_name": "河北省-唐山市"
        },
        {
            "id": "130201",
            "name": "市辖区",
            "parent_id": "130200",
            "level": "3",
            "full_name": "河北省-唐山市-市辖区"
        },
        {
            "id": "130202",
            "name": "路南区",
            "parent_id": "130200",
            "level": "3",
            "full_name": "河北省-唐山市-路南区"
        },
        {
            "id": "130203",
            "name": "路北区",
            "parent_id": "130200",
            "level": "3",
            "full_name": "河北省-唐山市-路北区"
        },
        {
            "id": "130204",
            "name": "古冶区",
            "parent_id": "130200",
            "level": "3",
            "full_name": "河北省-唐山市-古冶区"
        },
        {
            "id": "130205",
            "name": "开平区",
            "parent_id": "130200",
            "level": "3",
            "full_name": "河北省-唐山市-开平区"
        },
        {
            "id": "130207",
            "name": "丰南区",
            "parent_id": "130200",
            "level": "3",
            "full_name": "河北省-唐山市-丰南区"
        },
        {
            "id": "130208",
            "name": "丰润区",
            "parent_id": "130200",
            "level": "3",
            "full_name": "河北省-唐山市-丰润区"
        },
        {
            "id": "130209",
            "name": "曹妃甸区",
            "parent_id": "130200",
            "level": "3",
            "full_name": "河北省-唐山市-曹妃甸区"
        },
        {
            "id": "130223",
            "name": "滦县",
            "parent_id": "130200",
            "level": "3",
            "full_name": "河北省-唐山市-滦县"
        },
        {
            "id": "130224",
            "name": "滦南县",
            "parent_id": "130200",
            "level": "3",
            "full_name": "河北省-唐山市-滦南县"
        },
        {
            "id": "130225",
            "name": "乐亭县",
            "parent_id": "130200",
            "level": "3",
            "full_name": "河北省-唐山市-乐亭县"
        },
        {
            "id": "130227",
            "name": "迁西县",
            "parent_id": "130200",
            "level": "3",
            "full_name": "河北省-唐山市-迁西县"
        },
        {
            "id": "130229",
            "name": "玉田县",
            "parent_id": "130200",
            "level": "3",
            "full_name": "河北省-唐山市-玉田县"
        },
        {
            "id": "130281",
            "name": "遵化市",
            "parent_id": "130200",
            "level": "3",
            "full_name": "河北省-唐山市-遵化市"
        },
        {
            "id": "130283",
            "name": "迁安市",
            "parent_id": "130200",
            "level": "3",
            "full_name": "河北省-唐山市-迁安市"
        },
        {
            "id": "130300",
            "name": "秦皇岛市",
            "parent_id": "130000",
            "level": "2",
            "full_name": "河北省-秦皇岛市"
        },
        {
            "id": "130301",
            "name": "市辖区",
            "parent_id": "130300",
            "level": "3",
            "full_name": "河北省-秦皇岛市-市辖区"
        },
        {
            "id": "130302",
            "name": "海港区",
            "parent_id": "130300",
            "level": "3",
            "full_name": "河北省-秦皇岛市-海港区"
        },
        {
            "id": "130303",
            "name": "山海关区",
            "parent_id": "130300",
            "level": "3",
            "full_name": "河北省-秦皇岛市-山海关区"
        },
        {
            "id": "130304",
            "name": "北戴河区",
            "parent_id": "130300",
            "level": "3",
            "full_name": "河北省-秦皇岛市-北戴河区"
        },
        {
            "id": "130306",
            "name": "抚宁区",
            "parent_id": "130300",
            "level": "3",
            "full_name": "河北省-秦皇岛市-抚宁区"
        },
        {
            "id": "130321",
            "name": "青龙满族自治县",
            "parent_id": "130300",
            "level": "3",
            "full_name": "河北省-秦皇岛市-青龙满族自治县"
        },
        {
            "id": "130322",
            "name": "昌黎县",
            "parent_id": "130300",
            "level": "3",
            "full_name": "河北省-秦皇岛市-昌黎县"
        },
        {
            "id": "130324",
            "name": "卢龙县",
            "parent_id": "130300",
            "level": "3",
            "full_name": "河北省-秦皇岛市-卢龙县"
        },
        {
            "id": "130400",
            "name": "邯郸市",
            "parent_id": "130000",
            "level": "2",
            "full_name": "河北省-邯郸市"
        },
        {
            "id": "130401",
            "name": "市辖区",
            "parent_id": "130400",
            "level": "3",
            "full_name": "河北省-邯郸市-市辖区"
        },
        {
            "id": "130402",
            "name": "邯山区",
            "parent_id": "130400",
            "level": "3",
            "full_name": "河北省-邯郸市-邯山区"
        },
        {
            "id": "130403",
            "name": "丛台区",
            "parent_id": "130400",
            "level": "3",
            "full_name": "河北省-邯郸市-丛台区"
        },
        {
            "id": "130404",
            "name": "复兴区",
            "parent_id": "130400",
            "level": "3",
            "full_name": "河北省-邯郸市-复兴区"
        },
        {
            "id": "130406",
            "name": "峰峰矿区",
            "parent_id": "130400",
            "level": "3",
            "full_name": "河北省-邯郸市-峰峰矿区"
        },
        {
            "id": "130421",
            "name": "邯郸县",
            "parent_id": "130400",
            "level": "3",
            "full_name": "河北省-邯郸市-邯郸县"
        },
        {
            "id": "130423",
            "name": "临漳县",
            "parent_id": "130400",
            "level": "3",
            "full_name": "河北省-邯郸市-临漳县"
        },
        {
            "id": "130424",
            "name": "成安县",
            "parent_id": "130400",
            "level": "3",
            "full_name": "河北省-邯郸市-成安县"
        },
        {
            "id": "130425",
            "name": "大名县",
            "parent_id": "130400",
            "level": "3",
            "full_name": "河北省-邯郸市-大名县"
        },
        {
            "id": "130426",
            "name": "涉县",
            "parent_id": "130400",
            "level": "3",
            "full_name": "河北省-邯郸市-涉县"
        },
        {
            "id": "130427",
            "name": "磁县",
            "parent_id": "130400",
            "level": "3",
            "full_name": "河北省-邯郸市-磁县"
        },
        {
            "id": "130428",
            "name": "肥乡县",
            "parent_id": "130400",
            "level": "3",
            "full_name": "河北省-邯郸市-肥乡县"
        },
        {
            "id": "130429",
            "name": "永年县",
            "parent_id": "130400",
            "level": "3",
            "full_name": "河北省-邯郸市-永年县"
        },
        {
            "id": "130430",
            "name": "邱县",
            "parent_id": "130400",
            "level": "3",
            "full_name": "河北省-邯郸市-邱县"
        },
        {
            "id": "130431",
            "name": "鸡泽县",
            "parent_id": "130400",
            "level": "3",
            "full_name": "河北省-邯郸市-鸡泽县"
        },
        {
            "id": "130432",
            "name": "广平县",
            "parent_id": "130400",
            "level": "3",
            "full_name": "河北省-邯郸市-广平县"
        },
        {
            "id": "130433",
            "name": "馆陶县",
            "parent_id": "130400",
            "level": "3",
            "full_name": "河北省-邯郸市-馆陶县"
        },
        {
            "id": "130434",
            "name": "魏县",
            "parent_id": "130400",
            "level": "3",
            "full_name": "河北省-邯郸市-魏县"
        },
        {
            "id": "130435",
            "name": "曲周县",
            "parent_id": "130400",
            "level": "3",
            "full_name": "河北省-邯郸市-曲周县"
        },
        {
            "id": "130481",
            "name": "武安市",
            "parent_id": "130400",
            "level": "3",
            "full_name": "河北省-邯郸市-武安市"
        },
        {
            "id": "130500",
            "name": "邢台市",
            "parent_id": "130000",
            "level": "2",
            "full_name": "河北省-邢台市"
        },
        {
            "id": "130501",
            "name": "市辖区",
            "parent_id": "130500",
            "level": "3",
            "full_name": "河北省-邢台市-市辖区"
        },
        {
            "id": "130502",
            "name": "桥东区",
            "parent_id": "130500",
            "level": "3",
            "full_name": "河北省-邢台市-桥东区"
        },
        {
            "id": "130503",
            "name": "桥西区",
            "parent_id": "130500",
            "level": "3",
            "full_name": "河北省-邢台市-桥西区"
        },
        {
            "id": "130521",
            "name": "邢台县",
            "parent_id": "130500",
            "level": "3",
            "full_name": "河北省-邢台市-邢台县"
        },
        {
            "id": "130522",
            "name": "临城县",
            "parent_id": "130500",
            "level": "3",
            "full_name": "河北省-邢台市-临城县"
        },
        {
            "id": "130523",
            "name": "内丘县",
            "parent_id": "130500",
            "level": "3",
            "full_name": "河北省-邢台市-内丘县"
        },
        {
            "id": "130524",
            "name": "柏乡县",
            "parent_id": "130500",
            "level": "3",
            "full_name": "河北省-邢台市-柏乡县"
        },
        {
            "id": "130525",
            "name": "隆尧县",
            "parent_id": "130500",
            "level": "3",
            "full_name": "河北省-邢台市-隆尧县"
        },
        {
            "id": "130526",
            "name": "任县",
            "parent_id": "130500",
            "level": "3",
            "full_name": "河北省-邢台市-任县"
        },
        {
            "id": "130527",
            "name": "南和县",
            "parent_id": "130500",
            "level": "3",
            "full_name": "河北省-邢台市-南和县"
        },
        {
            "id": "130528",
            "name": "宁晋县",
            "parent_id": "130500",
            "level": "3",
            "full_name": "河北省-邢台市-宁晋县"
        },
        {
            "id": "130529",
            "name": "巨鹿县",
            "parent_id": "130500",
            "level": "3",
            "full_name": "河北省-邢台市-巨鹿县"
        },
        {
            "id": "130530",
            "name": "新河县",
            "parent_id": "130500",
            "level": "3",
            "full_name": "河北省-邢台市-新河县"
        },
        {
            "id": "130531",
            "name": "广宗县",
            "parent_id": "130500",
            "level": "3",
            "full_name": "河北省-邢台市-广宗县"
        },
        {
            "id": "130532",
            "name": "平乡县",
            "parent_id": "130500",
            "level": "3",
            "full_name": "河北省-邢台市-平乡县"
        },
        {
            "id": "130533",
            "name": "威县",
            "parent_id": "130500",
            "level": "3",
            "full_name": "河北省-邢台市-威县"
        },
        {
            "id": "130534",
            "name": "清河县",
            "parent_id": "130500",
            "level": "3",
            "full_name": "河北省-邢台市-清河县"
        },
        {
            "id": "130535",
            "name": "临西县",
            "parent_id": "130500",
            "level": "3",
            "full_name": "河北省-邢台市-临西县"
        },
        {
            "id": "130581",
            "name": "南宫市",
            "parent_id": "130500",
            "level": "3",
            "full_name": "河北省-邢台市-南宫市"
        },
        {
            "id": "130582",
            "name": "沙河市",
            "parent_id": "130500",
            "level": "3",
            "full_name": "河北省-邢台市-沙河市"
        },
        {
            "id": "130600",
            "name": "保定市",
            "parent_id": "130000",
            "level": "2",
            "full_name": "河北省-保定市"
        },
        {
            "id": "130601",
            "name": "市辖区",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-市辖区"
        },
        {
            "id": "130602",
            "name": "竞秀区",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-竞秀区"
        },
        {
            "id": "130606",
            "name": "莲池区",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-莲池区"
        },
        {
            "id": "130607",
            "name": "满城区",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-满城区"
        },
        {
            "id": "130608",
            "name": "清苑区",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-清苑区"
        },
        {
            "id": "130609",
            "name": "徐水区",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-徐水区"
        },
        {
            "id": "130623",
            "name": "涞水县",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-涞水县"
        },
        {
            "id": "130624",
            "name": "阜平县",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-阜平县"
        },
        {
            "id": "130626",
            "name": "定兴县",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-定兴县"
        },
        {
            "id": "130627",
            "name": "唐县",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-唐县"
        },
        {
            "id": "130628",
            "name": "高阳县",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-高阳县"
        },
        {
            "id": "130629",
            "name": "容城县",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-容城县"
        },
        {
            "id": "130630",
            "name": "涞源县",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-涞源县"
        },
        {
            "id": "130631",
            "name": "望都县",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-望都县"
        },
        {
            "id": "130632",
            "name": "安新县",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-安新县"
        },
        {
            "id": "130633",
            "name": "易县",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-易县"
        },
        {
            "id": "130634",
            "name": "曲阳县",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-曲阳县"
        },
        {
            "id": "130635",
            "name": "蠡县",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-蠡县"
        },
        {
            "id": "130636",
            "name": "顺平县",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-顺平县"
        },
        {
            "id": "130637",
            "name": "博野县",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-博野县"
        },
        {
            "id": "130638",
            "name": "雄县",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-雄县"
        },
        {
            "id": "130681",
            "name": "涿州市",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-涿州市"
        },
        {
            "id": "130683",
            "name": "安国市",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-安国市"
        },
        {
            "id": "130684",
            "name": "高碑店市",
            "parent_id": "130600",
            "level": "3",
            "full_name": "河北省-保定市-高碑店市"
        },
        {
            "id": "130700",
            "name": "张家口市",
            "parent_id": "130000",
            "level": "2",
            "full_name": "河北省-张家口市"
        },
        {
            "id": "130701",
            "name": "市辖区",
            "parent_id": "130700",
            "level": "3",
            "full_name": "河北省-张家口市-市辖区"
        },
        {
            "id": "130702",
            "name": "桥东区",
            "parent_id": "130700",
            "level": "3",
            "full_name": "河北省-张家口市-桥东区"
        },
        {
            "id": "130703",
            "name": "桥西区",
            "parent_id": "130700",
            "level": "3",
            "full_name": "河北省-张家口市-桥西区"
        },
        {
            "id": "130705",
            "name": "宣化区",
            "parent_id": "130700",
            "level": "3",
            "full_name": "河北省-张家口市-宣化区"
        },
        {
            "id": "130706",
            "name": "下花园区",
            "parent_id": "130700",
            "level": "3",
            "full_name": "河北省-张家口市-下花园区"
        },
        {
            "id": "130721",
            "name": "宣化县",
            "parent_id": "130700",
            "level": "3",
            "full_name": "河北省-张家口市-宣化县"
        },
        {
            "id": "130722",
            "name": "张北县",
            "parent_id": "130700",
            "level": "3",
            "full_name": "河北省-张家口市-张北县"
        },
        {
            "id": "130723",
            "name": "康保县",
            "parent_id": "130700",
            "level": "3",
            "full_name": "河北省-张家口市-康保县"
        },
        {
            "id": "130724",
            "name": "沽源县",
            "parent_id": "130700",
            "level": "3",
            "full_name": "河北省-张家口市-沽源县"
        },
        {
            "id": "130725",
            "name": "尚义县",
            "parent_id": "130700",
            "level": "3",
            "full_name": "河北省-张家口市-尚义县"
        },
        {
            "id": "130726",
            "name": "蔚县",
            "parent_id": "130700",
            "level": "3",
            "full_name": "河北省-张家口市-蔚县"
        },
        {
            "id": "130727",
            "name": "阳原县",
            "parent_id": "130700",
            "level": "3",
            "full_name": "河北省-张家口市-阳原县"
        },
        {
            "id": "130728",
            "name": "怀安县",
            "parent_id": "130700",
            "level": "3",
            "full_name": "河北省-张家口市-怀安县"
        },
        {
            "id": "130729",
            "name": "万全县",
            "parent_id": "130700",
            "level": "3",
            "full_name": "河北省-张家口市-万全县"
        },
        {
            "id": "130730",
            "name": "怀来县",
            "parent_id": "130700",
            "level": "3",
            "full_name": "河北省-张家口市-怀来县"
        },
        {
            "id": "130731",
            "name": "涿鹿县",
            "parent_id": "130700",
            "level": "3",
            "full_name": "河北省-张家口市-涿鹿县"
        },
        {
            "id": "130732",
            "name": "赤城县",
            "parent_id": "130700",
            "level": "3",
            "full_name": "河北省-张家口市-赤城县"
        },
        {
            "id": "130733",
            "name": "崇礼县",
            "parent_id": "130700",
            "level": "3",
            "full_name": "河北省-张家口市-崇礼县"
        },
        {
            "id": "130800",
            "name": "承德市",
            "parent_id": "130000",
            "level": "2",
            "full_name": "河北省-承德市"
        },
        {
            "id": "130801",
            "name": "市辖区",
            "parent_id": "130800",
            "level": "3",
            "full_name": "河北省-承德市-市辖区"
        },
        {
            "id": "130802",
            "name": "双桥区",
            "parent_id": "130800",
            "level": "3",
            "full_name": "河北省-承德市-双桥区"
        },
        {
            "id": "130803",
            "name": "双滦区",
            "parent_id": "130800",
            "level": "3",
            "full_name": "河北省-承德市-双滦区"
        },
        {
            "id": "130804",
            "name": "鹰手营子矿区",
            "parent_id": "130800",
            "level": "3",
            "full_name": "河北省-承德市-鹰手营子矿区"
        },
        {
            "id": "130821",
            "name": "承德县",
            "parent_id": "130800",
            "level": "3",
            "full_name": "河北省-承德市-承德县"
        },
        {
            "id": "130822",
            "name": "兴隆县",
            "parent_id": "130800",
            "level": "3",
            "full_name": "河北省-承德市-兴隆县"
        },
        {
            "id": "130823",
            "name": "平泉县",
            "parent_id": "130800",
            "level": "3",
            "full_name": "河北省-承德市-平泉县"
        },
        {
            "id": "130824",
            "name": "滦平县",
            "parent_id": "130800",
            "level": "3",
            "full_name": "河北省-承德市-滦平县"
        },
        {
            "id": "130825",
            "name": "隆化县",
            "parent_id": "130800",
            "level": "3",
            "full_name": "河北省-承德市-隆化县"
        },
        {
            "id": "130826",
            "name": "丰宁满族自治县",
            "parent_id": "130800",
            "level": "3",
            "full_name": "河北省-承德市-丰宁满族自治县"
        },
        {
            "id": "130827",
            "name": "宽城满族自治县",
            "parent_id": "130800",
            "level": "3",
            "full_name": "河北省-承德市-宽城满族自治县"
        },
        {
            "id": "130828",
            "name": "围场满族蒙古族自治县",
            "parent_id": "130800",
            "level": "3",
            "full_name": "河北省-承德市-围场满族蒙古族自治县"
        },
        {
            "id": "130900",
            "name": "沧州市",
            "parent_id": "130000",
            "level": "2",
            "full_name": "河北省-沧州市"
        },
        {
            "id": "130901",
            "name": "市辖区",
            "parent_id": "130900",
            "level": "3",
            "full_name": "河北省-沧州市-市辖区"
        },
        {
            "id": "130902",
            "name": "新华区",
            "parent_id": "130900",
            "level": "3",
            "full_name": "河北省-沧州市-新华区"
        },
        {
            "id": "130903",
            "name": "运河区",
            "parent_id": "130900",
            "level": "3",
            "full_name": "河北省-沧州市-运河区"
        },
        {
            "id": "130921",
            "name": "沧县",
            "parent_id": "130900",
            "level": "3",
            "full_name": "河北省-沧州市-沧县"
        },
        {
            "id": "130922",
            "name": "青县",
            "parent_id": "130900",
            "level": "3",
            "full_name": "河北省-沧州市-青县"
        },
        {
            "id": "130923",
            "name": "东光县",
            "parent_id": "130900",
            "level": "3",
            "full_name": "河北省-沧州市-东光县"
        },
        {
            "id": "130924",
            "name": "海兴县",
            "parent_id": "130900",
            "level": "3",
            "full_name": "河北省-沧州市-海兴县"
        },
        {
            "id": "130925",
            "name": "盐山县",
            "parent_id": "130900",
            "level": "3",
            "full_name": "河北省-沧州市-盐山县"
        },
        {
            "id": "130926",
            "name": "肃宁县",
            "parent_id": "130900",
            "level": "3",
            "full_name": "河北省-沧州市-肃宁县"
        },
        {
            "id": "130927",
            "name": "南皮县",
            "parent_id": "130900",
            "level": "3",
            "full_name": "河北省-沧州市-南皮县"
        },
        {
            "id": "130928",
            "name": "吴桥县",
            "parent_id": "130900",
            "level": "3",
            "full_name": "河北省-沧州市-吴桥县"
        },
        {
            "id": "130929",
            "name": "献县",
            "parent_id": "130900",
            "level": "3",
            "full_name": "河北省-沧州市-献县"
        },
        {
            "id": "130930",
            "name": "孟村回族自治县",
            "parent_id": "130900",
            "level": "3",
            "full_name": "河北省-沧州市-孟村回族自治县"
        },
        {
            "id": "130981",
            "name": "泊头市",
            "parent_id": "130900",
            "level": "3",
            "full_name": "河北省-沧州市-泊头市"
        },
        {
            "id": "130982",
            "name": "任丘市",
            "parent_id": "130900",
            "level": "3",
            "full_name": "河北省-沧州市-任丘市"
        },
        {
            "id": "130983",
            "name": "黄骅市",
            "parent_id": "130900",
            "level": "3",
            "full_name": "河北省-沧州市-黄骅市"
        },
        {
            "id": "130984",
            "name": "河间市",
            "parent_id": "130900",
            "level": "3",
            "full_name": "河北省-沧州市-河间市"
        },
        {
            "id": "131000",
            "name": "廊坊市",
            "parent_id": "130000",
            "level": "2",
            "full_name": "河北省-廊坊市"
        },
        {
            "id": "131001",
            "name": "市辖区",
            "parent_id": "131000",
            "level": "3",
            "full_name": "河北省-廊坊市-市辖区"
        },
        {
            "id": "131002",
            "name": "安次区",
            "parent_id": "131000",
            "level": "3",
            "full_name": "河北省-廊坊市-安次区"
        },
        {
            "id": "131003",
            "name": "广阳区",
            "parent_id": "131000",
            "level": "3",
            "full_name": "河北省-廊坊市-广阳区"
        },
        {
            "id": "131022",
            "name": "固安县",
            "parent_id": "131000",
            "level": "3",
            "full_name": "河北省-廊坊市-固安县"
        },
        {
            "id": "131023",
            "name": "永清县",
            "parent_id": "131000",
            "level": "3",
            "full_name": "河北省-廊坊市-永清县"
        },
        {
            "id": "131024",
            "name": "香河县",
            "parent_id": "131000",
            "level": "3",
            "full_name": "河北省-廊坊市-香河县"
        },
        {
            "id": "131025",
            "name": "大城县",
            "parent_id": "131000",
            "level": "3",
            "full_name": "河北省-廊坊市-大城县"
        },
        {
            "id": "131026",
            "name": "文安县",
            "parent_id": "131000",
            "level": "3",
            "full_name": "河北省-廊坊市-文安县"
        },
        {
            "id": "131028",
            "name": "大厂回族自治县",
            "parent_id": "131000",
            "level": "3",
            "full_name": "河北省-廊坊市-大厂回族自治县"
        },
        {
            "id": "131081",
            "name": "霸州市",
            "parent_id": "131000",
            "level": "3",
            "full_name": "河北省-廊坊市-霸州市"
        },
        {
            "id": "131082",
            "name": "三河市",
            "parent_id": "131000",
            "level": "3",
            "full_name": "河北省-廊坊市-三河市"
        },
        {
            "id": "131100",
            "name": "衡水市",
            "parent_id": "130000",
            "level": "2",
            "full_name": "河北省-衡水市"
        },
        {
            "id": "131101",
            "name": "市辖区",
            "parent_id": "131100",
            "level": "3",
            "full_name": "河北省-衡水市-市辖区"
        },
        {
            "id": "131102",
            "name": "桃城区",
            "parent_id": "131100",
            "level": "3",
            "full_name": "河北省-衡水市-桃城区"
        },
        {
            "id": "131121",
            "name": "枣强县",
            "parent_id": "131100",
            "level": "3",
            "full_name": "河北省-衡水市-枣强县"
        },
        {
            "id": "131122",
            "name": "武邑县",
            "parent_id": "131100",
            "level": "3",
            "full_name": "河北省-衡水市-武邑县"
        },
        {
            "id": "131123",
            "name": "武强县",
            "parent_id": "131100",
            "level": "3",
            "full_name": "河北省-衡水市-武强县"
        },
        {
            "id": "131124",
            "name": "饶阳县",
            "parent_id": "131100",
            "level": "3",
            "full_name": "河北省-衡水市-饶阳县"
        },
        {
            "id": "131125",
            "name": "安平县",
            "parent_id": "131100",
            "level": "3",
            "full_name": "河北省-衡水市-安平县"
        },
        {
            "id": "131126",
            "name": "故城县",
            "parent_id": "131100",
            "level": "3",
            "full_name": "河北省-衡水市-故城县"
        },
        {
            "id": "131127",
            "name": "景县",
            "parent_id": "131100",
            "level": "3",
            "full_name": "河北省-衡水市-景县"
        },
        {
            "id": "131128",
            "name": "阜城县",
            "parent_id": "131100",
            "level": "3",
            "full_name": "河北省-衡水市-阜城县"
        },
        {
            "id": "131181",
            "name": "冀州市",
            "parent_id": "131100",
            "level": "3",
            "full_name": "河北省-衡水市-冀州市"
        },
        {
            "id": "131182",
            "name": "深州市",
            "parent_id": "131100",
            "level": "3",
            "full_name": "河北省-衡水市-深州市"
        },
        {
            "id": "139000",
            "name": "省直辖县级行政区划",
            "parent_id": "130000",
            "level": "2",
            "full_name": "河北省-省直辖县级行政区划"
        },
        {
            "id": "139001",
            "name": "定州市",
            "parent_id": "139000",
            "level": "3",
            "full_name": "河北省-省直辖县级行政区划-定州市"
        },
        {
            "id": "139002",
            "name": "辛集市",
            "parent_id": "139000",
            "level": "3",
            "full_name": "河北省-省直辖县级行政区划-辛集市"
        },
        {
            "id": "140000",
            "name": "山西省",
            "parent_id": "0",
            "level": "1",
            "full_name": "山西省"
        },
        {
            "id": "140100",
            "name": "太原市",
            "parent_id": "140000",
            "level": "2",
            "full_name": "山西省-太原市"
        },
        {
            "id": "140101",
            "name": "市辖区",
            "parent_id": "140100",
            "level": "3",
            "full_name": "山西省-太原市-市辖区"
        },
        {
            "id": "140105",
            "name": "小店区",
            "parent_id": "140100",
            "level": "3",
            "full_name": "山西省-太原市-小店区"
        },
        {
            "id": "140106",
            "name": "迎泽区",
            "parent_id": "140100",
            "level": "3",
            "full_name": "山西省-太原市-迎泽区"
        },
        {
            "id": "140107",
            "name": "杏花岭区",
            "parent_id": "140100",
            "level": "3",
            "full_name": "山西省-太原市-杏花岭区"
        },
        {
            "id": "140108",
            "name": "尖草坪区",
            "parent_id": "140100",
            "level": "3",
            "full_name": "山西省-太原市-尖草坪区"
        },
        {
            "id": "140109",
            "name": "万柏林区",
            "parent_id": "140100",
            "level": "3",
            "full_name": "山西省-太原市-万柏林区"
        },
        {
            "id": "140110",
            "name": "晋源区",
            "parent_id": "140100",
            "level": "3",
            "full_name": "山西省-太原市-晋源区"
        },
        {
            "id": "140121",
            "name": "清徐县",
            "parent_id": "140100",
            "level": "3",
            "full_name": "山西省-太原市-清徐县"
        },
        {
            "id": "140122",
            "name": "阳曲县",
            "parent_id": "140100",
            "level": "3",
            "full_name": "山西省-太原市-阳曲县"
        },
        {
            "id": "140123",
            "name": "娄烦县",
            "parent_id": "140100",
            "level": "3",
            "full_name": "山西省-太原市-娄烦县"
        },
        {
            "id": "140181",
            "name": "古交市",
            "parent_id": "140100",
            "level": "3",
            "full_name": "山西省-太原市-古交市"
        },
        {
            "id": "140200",
            "name": "大同市",
            "parent_id": "140000",
            "level": "2",
            "full_name": "山西省-大同市"
        },
        {
            "id": "140201",
            "name": "市辖区",
            "parent_id": "140200",
            "level": "3",
            "full_name": "山西省-大同市-市辖区"
        },
        {
            "id": "140202",
            "name": "城区",
            "parent_id": "140200",
            "level": "3",
            "full_name": "山西省-大同市-城区"
        },
        {
            "id": "140203",
            "name": "矿区",
            "parent_id": "140200",
            "level": "3",
            "full_name": "山西省-大同市-矿区"
        },
        {
            "id": "140211",
            "name": "南郊区",
            "parent_id": "140200",
            "level": "3",
            "full_name": "山西省-大同市-南郊区"
        },
        {
            "id": "140212",
            "name": "新荣区",
            "parent_id": "140200",
            "level": "3",
            "full_name": "山西省-大同市-新荣区"
        },
        {
            "id": "140221",
            "name": "阳高县",
            "parent_id": "140200",
            "level": "3",
            "full_name": "山西省-大同市-阳高县"
        },
        {
            "id": "140222",
            "name": "天镇县",
            "parent_id": "140200",
            "level": "3",
            "full_name": "山西省-大同市-天镇县"
        },
        {
            "id": "140223",
            "name": "广灵县",
            "parent_id": "140200",
            "level": "3",
            "full_name": "山西省-大同市-广灵县"
        },
        {
            "id": "140224",
            "name": "灵丘县",
            "parent_id": "140200",
            "level": "3",
            "full_name": "山西省-大同市-灵丘县"
        },
        {
            "id": "140225",
            "name": "浑源县",
            "parent_id": "140200",
            "level": "3",
            "full_name": "山西省-大同市-浑源县"
        },
        {
            "id": "140226",
            "name": "左云县",
            "parent_id": "140200",
            "level": "3",
            "full_name": "山西省-大同市-左云县"
        },
        {
            "id": "140227",
            "name": "大同县",
            "parent_id": "140200",
            "level": "3",
            "full_name": "山西省-大同市-大同县"
        },
        {
            "id": "140300",
            "name": "阳泉市",
            "parent_id": "140000",
            "level": "2",
            "full_name": "山西省-阳泉市"
        },
        {
            "id": "140301",
            "name": "市辖区",
            "parent_id": "140300",
            "level": "3",
            "full_name": "山西省-阳泉市-市辖区"
        },
        {
            "id": "140302",
            "name": "城区",
            "parent_id": "140300",
            "level": "3",
            "full_name": "山西省-阳泉市-城区"
        },
        {
            "id": "140303",
            "name": "矿区",
            "parent_id": "140300",
            "level": "3",
            "full_name": "山西省-阳泉市-矿区"
        },
        {
            "id": "140311",
            "name": "郊区",
            "parent_id": "140300",
            "level": "3",
            "full_name": "山西省-阳泉市-郊区"
        },
        {
            "id": "140321",
            "name": "平定县",
            "parent_id": "140300",
            "level": "3",
            "full_name": "山西省-阳泉市-平定县"
        },
        {
            "id": "140322",
            "name": "盂县",
            "parent_id": "140300",
            "level": "3",
            "full_name": "山西省-阳泉市-盂县"
        },
        {
            "id": "140400",
            "name": "长治市",
            "parent_id": "140000",
            "level": "2",
            "full_name": "山西省-长治市"
        },
        {
            "id": "140401",
            "name": "市辖区",
            "parent_id": "140400",
            "level": "3",
            "full_name": "山西省-长治市-市辖区"
        },
        {
            "id": "140402",
            "name": "城区",
            "parent_id": "140400",
            "level": "3",
            "full_name": "山西省-长治市-城区"
        },
        {
            "id": "140411",
            "name": "郊区",
            "parent_id": "140400",
            "level": "3",
            "full_name": "山西省-长治市-郊区"
        },
        {
            "id": "140421",
            "name": "长治县",
            "parent_id": "140400",
            "level": "3",
            "full_name": "山西省-长治市-长治县"
        },
        {
            "id": "140423",
            "name": "襄垣县",
            "parent_id": "140400",
            "level": "3",
            "full_name": "山西省-长治市-襄垣县"
        },
        {
            "id": "140424",
            "name": "屯留县",
            "parent_id": "140400",
            "level": "3",
            "full_name": "山西省-长治市-屯留县"
        },
        {
            "id": "140425",
            "name": "平顺县",
            "parent_id": "140400",
            "level": "3",
            "full_name": "山西省-长治市-平顺县"
        },
        {
            "id": "140426",
            "name": "黎城县",
            "parent_id": "140400",
            "level": "3",
            "full_name": "山西省-长治市-黎城县"
        },
        {
            "id": "140427",
            "name": "壶关县",
            "parent_id": "140400",
            "level": "3",
            "full_name": "山西省-长治市-壶关县"
        },
        {
            "id": "140428",
            "name": "长子县",
            "parent_id": "140400",
            "level": "3",
            "full_name": "山西省-长治市-长子县"
        },
        {
            "id": "140429",
            "name": "武乡县",
            "parent_id": "140400",
            "level": "3",
            "full_name": "山西省-长治市-武乡县"
        },
        {
            "id": "140430",
            "name": "沁县",
            "parent_id": "140400",
            "level": "3",
            "full_name": "山西省-长治市-沁县"
        },
        {
            "id": "140431",
            "name": "沁源县",
            "parent_id": "140400",
            "level": "3",
            "full_name": "山西省-长治市-沁源县"
        },
        {
            "id": "140481",
            "name": "潞城市",
            "parent_id": "140400",
            "level": "3",
            "full_name": "山西省-长治市-潞城市"
        },
        {
            "id": "140500",
            "name": "晋城市",
            "parent_id": "140000",
            "level": "2",
            "full_name": "山西省-晋城市"
        },
        {
            "id": "140501",
            "name": "市辖区",
            "parent_id": "140500",
            "level": "3",
            "full_name": "山西省-晋城市-市辖区"
        },
        {
            "id": "140502",
            "name": "城区",
            "parent_id": "140500",
            "level": "3",
            "full_name": "山西省-晋城市-城区"
        },
        {
            "id": "140521",
            "name": "沁水县",
            "parent_id": "140500",
            "level": "3",
            "full_name": "山西省-晋城市-沁水县"
        },
        {
            "id": "140522",
            "name": "阳城县",
            "parent_id": "140500",
            "level": "3",
            "full_name": "山西省-晋城市-阳城县"
        },
        {
            "id": "140524",
            "name": "陵川县",
            "parent_id": "140500",
            "level": "3",
            "full_name": "山西省-晋城市-陵川县"
        },
        {
            "id": "140525",
            "name": "泽州县",
            "parent_id": "140500",
            "level": "3",
            "full_name": "山西省-晋城市-泽州县"
        },
        {
            "id": "140581",
            "name": "高平市",
            "parent_id": "140500",
            "level": "3",
            "full_name": "山西省-晋城市-高平市"
        },
        {
            "id": "140600",
            "name": "朔州市",
            "parent_id": "140000",
            "level": "2",
            "full_name": "山西省-朔州市"
        },
        {
            "id": "140601",
            "name": "市辖区",
            "parent_id": "140600",
            "level": "3",
            "full_name": "山西省-朔州市-市辖区"
        },
        {
            "id": "140602",
            "name": "朔城区",
            "parent_id": "140600",
            "level": "3",
            "full_name": "山西省-朔州市-朔城区"
        },
        {
            "id": "140603",
            "name": "平鲁区",
            "parent_id": "140600",
            "level": "3",
            "full_name": "山西省-朔州市-平鲁区"
        },
        {
            "id": "140621",
            "name": "山阴县",
            "parent_id": "140600",
            "level": "3",
            "full_name": "山西省-朔州市-山阴县"
        },
        {
            "id": "140622",
            "name": "应县",
            "parent_id": "140600",
            "level": "3",
            "full_name": "山西省-朔州市-应县"
        },
        {
            "id": "140623",
            "name": "右玉县",
            "parent_id": "140600",
            "level": "3",
            "full_name": "山西省-朔州市-右玉县"
        },
        {
            "id": "140624",
            "name": "怀仁县",
            "parent_id": "140600",
            "level": "3",
            "full_name": "山西省-朔州市-怀仁县"
        },
        {
            "id": "140700",
            "name": "晋中市",
            "parent_id": "140000",
            "level": "2",
            "full_name": "山西省-晋中市"
        },
        {
            "id": "140701",
            "name": "市辖区",
            "parent_id": "140700",
            "level": "3",
            "full_name": "山西省-晋中市-市辖区"
        },
        {
            "id": "140702",
            "name": "榆次区",
            "parent_id": "140700",
            "level": "3",
            "full_name": "山西省-晋中市-榆次区"
        },
        {
            "id": "140721",
            "name": "榆社县",
            "parent_id": "140700",
            "level": "3",
            "full_name": "山西省-晋中市-榆社县"
        },
        {
            "id": "140722",
            "name": "左权县",
            "parent_id": "140700",
            "level": "3",
            "full_name": "山西省-晋中市-左权县"
        },
        {
            "id": "140723",
            "name": "和顺县",
            "parent_id": "140700",
            "level": "3",
            "full_name": "山西省-晋中市-和顺县"
        },
        {
            "id": "140724",
            "name": "昔阳县",
            "parent_id": "140700",
            "level": "3",
            "full_name": "山西省-晋中市-昔阳县"
        },
        {
            "id": "140725",
            "name": "寿阳县",
            "parent_id": "140700",
            "level": "3",
            "full_name": "山西省-晋中市-寿阳县"
        },
        {
            "id": "140726",
            "name": "太谷县",
            "parent_id": "140700",
            "level": "3",
            "full_name": "山西省-晋中市-太谷县"
        },
        {
            "id": "140727",
            "name": "祁县",
            "parent_id": "140700",
            "level": "3",
            "full_name": "山西省-晋中市-祁县"
        },
        {
            "id": "140728",
            "name": "平遥县",
            "parent_id": "140700",
            "level": "3",
            "full_name": "山西省-晋中市-平遥县"
        },
        {
            "id": "140729",
            "name": "灵石县",
            "parent_id": "140700",
            "level": "3",
            "full_name": "山西省-晋中市-灵石县"
        },
        {
            "id": "140781",
            "name": "介休市",
            "parent_id": "140700",
            "level": "3",
            "full_name": "山西省-晋中市-介休市"
        },
        {
            "id": "140800",
            "name": "运城市",
            "parent_id": "140000",
            "level": "2",
            "full_name": "山西省-运城市"
        },
        {
            "id": "140801",
            "name": "市辖区",
            "parent_id": "140800",
            "level": "3",
            "full_name": "山西省-运城市-市辖区"
        },
        {
            "id": "140802",
            "name": "盐湖区",
            "parent_id": "140800",
            "level": "3",
            "full_name": "山西省-运城市-盐湖区"
        },
        {
            "id": "140821",
            "name": "临猗县",
            "parent_id": "140800",
            "level": "3",
            "full_name": "山西省-运城市-临猗县"
        },
        {
            "id": "140822",
            "name": "万荣县",
            "parent_id": "140800",
            "level": "3",
            "full_name": "山西省-运城市-万荣县"
        },
        {
            "id": "140823",
            "name": "闻喜县",
            "parent_id": "140800",
            "level": "3",
            "full_name": "山西省-运城市-闻喜县"
        },
        {
            "id": "140824",
            "name": "稷山县",
            "parent_id": "140800",
            "level": "3",
            "full_name": "山西省-运城市-稷山县"
        },
        {
            "id": "140825",
            "name": "新绛县",
            "parent_id": "140800",
            "level": "3",
            "full_name": "山西省-运城市-新绛县"
        },
        {
            "id": "140826",
            "name": "绛县",
            "parent_id": "140800",
            "level": "3",
            "full_name": "山西省-运城市-绛县"
        },
        {
            "id": "140827",
            "name": "垣曲县",
            "parent_id": "140800",
            "level": "3",
            "full_name": "山西省-运城市-垣曲县"
        },
        {
            "id": "140828",
            "name": "夏县",
            "parent_id": "140800",
            "level": "3",
            "full_name": "山西省-运城市-夏县"
        },
        {
            "id": "140829",
            "name": "平陆县",
            "parent_id": "140800",
            "level": "3",
            "full_name": "山西省-运城市-平陆县"
        },
        {
            "id": "140830",
            "name": "芮城县",
            "parent_id": "140800",
            "level": "3",
            "full_name": "山西省-运城市-芮城县"
        },
        {
            "id": "140881",
            "name": "永济市",
            "parent_id": "140800",
            "level": "3",
            "full_name": "山西省-运城市-永济市"
        },
        {
            "id": "140882",
            "name": "河津市",
            "parent_id": "140800",
            "level": "3",
            "full_name": "山西省-运城市-河津市"
        },
        {
            "id": "140900",
            "name": "忻州市",
            "parent_id": "140000",
            "level": "2",
            "full_name": "山西省-忻州市"
        },
        {
            "id": "140901",
            "name": "市辖区",
            "parent_id": "140900",
            "level": "3",
            "full_name": "山西省-忻州市-市辖区"
        },
        {
            "id": "140902",
            "name": "忻府区",
            "parent_id": "140900",
            "level": "3",
            "full_name": "山西省-忻州市-忻府区"
        },
        {
            "id": "140921",
            "name": "定襄县",
            "parent_id": "140900",
            "level": "3",
            "full_name": "山西省-忻州市-定襄县"
        },
        {
            "id": "140922",
            "name": "五台县",
            "parent_id": "140900",
            "level": "3",
            "full_name": "山西省-忻州市-五台县"
        },
        {
            "id": "140923",
            "name": "代县",
            "parent_id": "140900",
            "level": "3",
            "full_name": "山西省-忻州市-代县"
        },
        {
            "id": "140924",
            "name": "繁峙县",
            "parent_id": "140900",
            "level": "3",
            "full_name": "山西省-忻州市-繁峙县"
        },
        {
            "id": "140925",
            "name": "宁武县",
            "parent_id": "140900",
            "level": "3",
            "full_name": "山西省-忻州市-宁武县"
        },
        {
            "id": "140926",
            "name": "静乐县",
            "parent_id": "140900",
            "level": "3",
            "full_name": "山西省-忻州市-静乐县"
        },
        {
            "id": "140927",
            "name": "神池县",
            "parent_id": "140900",
            "level": "3",
            "full_name": "山西省-忻州市-神池县"
        },
        {
            "id": "140928",
            "name": "五寨县",
            "parent_id": "140900",
            "level": "3",
            "full_name": "山西省-忻州市-五寨县"
        },
        {
            "id": "140929",
            "name": "岢岚县",
            "parent_id": "140900",
            "level": "3",
            "full_name": "山西省-忻州市-岢岚县"
        },
        {
            "id": "140930",
            "name": "河曲县",
            "parent_id": "140900",
            "level": "3",
            "full_name": "山西省-忻州市-河曲县"
        },
        {
            "id": "140931",
            "name": "保德县",
            "parent_id": "140900",
            "level": "3",
            "full_name": "山西省-忻州市-保德县"
        },
        {
            "id": "140932",
            "name": "偏关县",
            "parent_id": "140900",
            "level": "3",
            "full_name": "山西省-忻州市-偏关县"
        },
        {
            "id": "140981",
            "name": "原平市",
            "parent_id": "140900",
            "level": "3",
            "full_name": "山西省-忻州市-原平市"
        },
        {
            "id": "141000",
            "name": "临汾市",
            "parent_id": "140000",
            "level": "2",
            "full_name": "山西省-临汾市"
        },
        {
            "id": "141001",
            "name": "市辖区",
            "parent_id": "141000",
            "level": "3",
            "full_name": "山西省-临汾市-市辖区"
        },
        {
            "id": "141002",
            "name": "尧都区",
            "parent_id": "141000",
            "level": "3",
            "full_name": "山西省-临汾市-尧都区"
        },
        {
            "id": "141021",
            "name": "曲沃县",
            "parent_id": "141000",
            "level": "3",
            "full_name": "山西省-临汾市-曲沃县"
        },
        {
            "id": "141022",
            "name": "翼城县",
            "parent_id": "141000",
            "level": "3",
            "full_name": "山西省-临汾市-翼城县"
        },
        {
            "id": "141023",
            "name": "襄汾县",
            "parent_id": "141000",
            "level": "3",
            "full_name": "山西省-临汾市-襄汾县"
        },
        {
            "id": "141024",
            "name": "洪洞县",
            "parent_id": "141000",
            "level": "3",
            "full_name": "山西省-临汾市-洪洞县"
        },
        {
            "id": "141025",
            "name": "古县",
            "parent_id": "141000",
            "level": "3",
            "full_name": "山西省-临汾市-古县"
        },
        {
            "id": "141026",
            "name": "安泽县",
            "parent_id": "141000",
            "level": "3",
            "full_name": "山西省-临汾市-安泽县"
        },
        {
            "id": "141027",
            "name": "浮山县",
            "parent_id": "141000",
            "level": "3",
            "full_name": "山西省-临汾市-浮山县"
        },
        {
            "id": "141028",
            "name": "吉县",
            "parent_id": "141000",
            "level": "3",
            "full_name": "山西省-临汾市-吉县"
        },
        {
            "id": "141029",
            "name": "乡宁县",
            "parent_id": "141000",
            "level": "3",
            "full_name": "山西省-临汾市-乡宁县"
        },
        {
            "id": "141030",
            "name": "大宁县",
            "parent_id": "141000",
            "level": "3",
            "full_name": "山西省-临汾市-大宁县"
        },
        {
            "id": "141031",
            "name": "隰县",
            "parent_id": "141000",
            "level": "3",
            "full_name": "山西省-临汾市-隰县"
        },
        {
            "id": "141032",
            "name": "永和县",
            "parent_id": "141000",
            "level": "3",
            "full_name": "山西省-临汾市-永和县"
        },
        {
            "id": "141033",
            "name": "蒲县",
            "parent_id": "141000",
            "level": "3",
            "full_name": "山西省-临汾市-蒲县"
        },
        {
            "id": "141034",
            "name": "汾西县",
            "parent_id": "141000",
            "level": "3",
            "full_name": "山西省-临汾市-汾西县"
        },
        {
            "id": "141081",
            "name": "侯马市",
            "parent_id": "141000",
            "level": "3",
            "full_name": "山西省-临汾市-侯马市"
        },
        {
            "id": "141082",
            "name": "霍州市",
            "parent_id": "141000",
            "level": "3",
            "full_name": "山西省-临汾市-霍州市"
        },
        {
            "id": "141100",
            "name": "吕梁市",
            "parent_id": "140000",
            "level": "2",
            "full_name": "山西省-吕梁市"
        },
        {
            "id": "141101",
            "name": "市辖区",
            "parent_id": "141100",
            "level": "3",
            "full_name": "山西省-吕梁市-市辖区"
        },
        {
            "id": "141102",
            "name": "离石区",
            "parent_id": "141100",
            "level": "3",
            "full_name": "山西省-吕梁市-离石区"
        },
        {
            "id": "141121",
            "name": "文水县",
            "parent_id": "141100",
            "level": "3",
            "full_name": "山西省-吕梁市-文水县"
        },
        {
            "id": "141122",
            "name": "交城县",
            "parent_id": "141100",
            "level": "3",
            "full_name": "山西省-吕梁市-交城县"
        },
        {
            "id": "141123",
            "name": "兴县",
            "parent_id": "141100",
            "level": "3",
            "full_name": "山西省-吕梁市-兴县"
        },
        {
            "id": "141124",
            "name": "临县",
            "parent_id": "141100",
            "level": "3",
            "full_name": "山西省-吕梁市-临县"
        },
        {
            "id": "141125",
            "name": "柳林县",
            "parent_id": "141100",
            "level": "3",
            "full_name": "山西省-吕梁市-柳林县"
        },
        {
            "id": "141126",
            "name": "石楼县",
            "parent_id": "141100",
            "level": "3",
            "full_name": "山西省-吕梁市-石楼县"
        },
        {
            "id": "141127",
            "name": "岚县",
            "parent_id": "141100",
            "level": "3",
            "full_name": "山西省-吕梁市-岚县"
        },
        {
            "id": "141128",
            "name": "方山县",
            "parent_id": "141100",
            "level": "3",
            "full_name": "山西省-吕梁市-方山县"
        },
        {
            "id": "141129",
            "name": "中阳县",
            "parent_id": "141100",
            "level": "3",
            "full_name": "山西省-吕梁市-中阳县"
        },
        {
            "id": "141130",
            "name": "交口县",
            "parent_id": "141100",
            "level": "3",
            "full_name": "山西省-吕梁市-交口县"
        },
        {
            "id": "141181",
            "name": "孝义市",
            "parent_id": "141100",
            "level": "3",
            "full_name": "山西省-吕梁市-孝义市"
        },
        {
            "id": "141182",
            "name": "汾阳市",
            "parent_id": "141100",
            "level": "3",
            "full_name": "山西省-吕梁市-汾阳市"
        },
        {
            "id": "150000",
            "name": "内蒙古自治区",
            "parent_id": "0",
            "level": "1",
            "full_name": "内蒙古自治区"
        },
        {
            "id": "150100",
            "name": "呼和浩特市",
            "parent_id": "150000",
            "level": "2",
            "full_name": "内蒙古自治区-呼和浩特市"
        },
        {
            "id": "150101",
            "name": "市辖区",
            "parent_id": "150100",
            "level": "3",
            "full_name": "内蒙古自治区-呼和浩特市-市辖区"
        },
        {
            "id": "150102",
            "name": "新城区",
            "parent_id": "150100",
            "level": "3",
            "full_name": "内蒙古自治区-呼和浩特市-新城区"
        },
        {
            "id": "150103",
            "name": "回民区",
            "parent_id": "150100",
            "level": "3",
            "full_name": "内蒙古自治区-呼和浩特市-回民区"
        },
        {
            "id": "150104",
            "name": "玉泉区",
            "parent_id": "150100",
            "level": "3",
            "full_name": "内蒙古自治区-呼和浩特市-玉泉区"
        },
        {
            "id": "150105",
            "name": "赛罕区",
            "parent_id": "150100",
            "level": "3",
            "full_name": "内蒙古自治区-呼和浩特市-赛罕区"
        },
        {
            "id": "150121",
            "name": "土默特左旗",
            "parent_id": "150100",
            "level": "3",
            "full_name": "内蒙古自治区-呼和浩特市-土默特左旗"
        },
        {
            "id": "150122",
            "name": "托克托县",
            "parent_id": "150100",
            "level": "3",
            "full_name": "内蒙古自治区-呼和浩特市-托克托县"
        },
        {
            "id": "150123",
            "name": "和林格尔县",
            "parent_id": "150100",
            "level": "3",
            "full_name": "内蒙古自治区-呼和浩特市-和林格尔县"
        },
        {
            "id": "150124",
            "name": "清水河县",
            "parent_id": "150100",
            "level": "3",
            "full_name": "内蒙古自治区-呼和浩特市-清水河县"
        },
        {
            "id": "150125",
            "name": "武川县",
            "parent_id": "150100",
            "level": "3",
            "full_name": "内蒙古自治区-呼和浩特市-武川县"
        },
        {
            "id": "150200",
            "name": "包头市",
            "parent_id": "150000",
            "level": "2",
            "full_name": "内蒙古自治区-包头市"
        },
        {
            "id": "150201",
            "name": "市辖区",
            "parent_id": "150200",
            "level": "3",
            "full_name": "内蒙古自治区-包头市-市辖区"
        },
        {
            "id": "150202",
            "name": "东河区",
            "parent_id": "150200",
            "level": "3",
            "full_name": "内蒙古自治区-包头市-东河区"
        },
        {
            "id": "150203",
            "name": "昆都仑区",
            "parent_id": "150200",
            "level": "3",
            "full_name": "内蒙古自治区-包头市-昆都仑区"
        },
        {
            "id": "150204",
            "name": "青山区",
            "parent_id": "150200",
            "level": "3",
            "full_name": "内蒙古自治区-包头市-青山区"
        },
        {
            "id": "150205",
            "name": "石拐区",
            "parent_id": "150200",
            "level": "3",
            "full_name": "内蒙古自治区-包头市-石拐区"
        },
        {
            "id": "150206",
            "name": "白云鄂博矿区",
            "parent_id": "150200",
            "level": "3",
            "full_name": "内蒙古自治区-包头市-白云鄂博矿区"
        },
        {
            "id": "150207",
            "name": "九原区",
            "parent_id": "150200",
            "level": "3",
            "full_name": "内蒙古自治区-包头市-九原区"
        },
        {
            "id": "150221",
            "name": "土默特右旗",
            "parent_id": "150200",
            "level": "3",
            "full_name": "内蒙古自治区-包头市-土默特右旗"
        },
        {
            "id": "150222",
            "name": "固阳县",
            "parent_id": "150200",
            "level": "3",
            "full_name": "内蒙古自治区-包头市-固阳县"
        },
        {
            "id": "150223",
            "name": "达尔罕茂明安联合旗",
            "parent_id": "150200",
            "level": "3",
            "full_name": "内蒙古自治区-包头市-达尔罕茂明安联合旗"
        },
        {
            "id": "150300",
            "name": "乌海市",
            "parent_id": "150000",
            "level": "2",
            "full_name": "内蒙古自治区-乌海市"
        },
        {
            "id": "150301",
            "name": "市辖区",
            "parent_id": "150300",
            "level": "3",
            "full_name": "内蒙古自治区-乌海市-市辖区"
        },
        {
            "id": "150302",
            "name": "海勃湾区",
            "parent_id": "150300",
            "level": "3",
            "full_name": "内蒙古自治区-乌海市-海勃湾区"
        },
        {
            "id": "150303",
            "name": "海南区",
            "parent_id": "150300",
            "level": "3",
            "full_name": "内蒙古自治区-乌海市-海南区"
        },
        {
            "id": "150304",
            "name": "乌达区",
            "parent_id": "150300",
            "level": "3",
            "full_name": "内蒙古自治区-乌海市-乌达区"
        },
        {
            "id": "150400",
            "name": "赤峰市",
            "parent_id": "150000",
            "level": "2",
            "full_name": "内蒙古自治区-赤峰市"
        },
        {
            "id": "150401",
            "name": "市辖区",
            "parent_id": "150400",
            "level": "3",
            "full_name": "内蒙古自治区-赤峰市-市辖区"
        },
        {
            "id": "150402",
            "name": "红山区",
            "parent_id": "150400",
            "level": "3",
            "full_name": "内蒙古自治区-赤峰市-红山区"
        },
        {
            "id": "150403",
            "name": "元宝山区",
            "parent_id": "150400",
            "level": "3",
            "full_name": "内蒙古自治区-赤峰市-元宝山区"
        },
        {
            "id": "150404",
            "name": "松山区",
            "parent_id": "150400",
            "level": "3",
            "full_name": "内蒙古自治区-赤峰市-松山区"
        },
        {
            "id": "150421",
            "name": "阿鲁科尔沁旗",
            "parent_id": "150400",
            "level": "3",
            "full_name": "内蒙古自治区-赤峰市-阿鲁科尔沁旗"
        },
        {
            "id": "150422",
            "name": "巴林左旗",
            "parent_id": "150400",
            "level": "3",
            "full_name": "内蒙古自治区-赤峰市-巴林左旗"
        },
        {
            "id": "150423",
            "name": "巴林右旗",
            "parent_id": "150400",
            "level": "3",
            "full_name": "内蒙古自治区-赤峰市-巴林右旗"
        },
        {
            "id": "150424",
            "name": "林西县",
            "parent_id": "150400",
            "level": "3",
            "full_name": "内蒙古自治区-赤峰市-林西县"
        },
        {
            "id": "150425",
            "name": "克什克腾旗",
            "parent_id": "150400",
            "level": "3",
            "full_name": "内蒙古自治区-赤峰市-克什克腾旗"
        },
        {
            "id": "150426",
            "name": "翁牛特旗",
            "parent_id": "150400",
            "level": "3",
            "full_name": "内蒙古自治区-赤峰市-翁牛特旗"
        },
        {
            "id": "150428",
            "name": "喀喇沁旗",
            "parent_id": "150400",
            "level": "3",
            "full_name": "内蒙古自治区-赤峰市-喀喇沁旗"
        },
        {
            "id": "150429",
            "name": "宁城县",
            "parent_id": "150400",
            "level": "3",
            "full_name": "内蒙古自治区-赤峰市-宁城县"
        },
        {
            "id": "150430",
            "name": "敖汉旗",
            "parent_id": "150400",
            "level": "3",
            "full_name": "内蒙古自治区-赤峰市-敖汉旗"
        },
        {
            "id": "150500",
            "name": "通辽市",
            "parent_id": "150000",
            "level": "2",
            "full_name": "内蒙古自治区-通辽市"
        },
        {
            "id": "150501",
            "name": "市辖区",
            "parent_id": "150500",
            "level": "3",
            "full_name": "内蒙古自治区-通辽市-市辖区"
        },
        {
            "id": "150502",
            "name": "科尔沁区",
            "parent_id": "150500",
            "level": "3",
            "full_name": "内蒙古自治区-通辽市-科尔沁区"
        },
        {
            "id": "150521",
            "name": "科尔沁左翼中旗",
            "parent_id": "150500",
            "level": "3",
            "full_name": "内蒙古自治区-通辽市-科尔沁左翼中旗"
        },
        {
            "id": "150522",
            "name": "科尔沁左翼后旗",
            "parent_id": "150500",
            "level": "3",
            "full_name": "内蒙古自治区-通辽市-科尔沁左翼后旗"
        },
        {
            "id": "150523",
            "name": "开鲁县",
            "parent_id": "150500",
            "level": "3",
            "full_name": "内蒙古自治区-通辽市-开鲁县"
        },
        {
            "id": "150524",
            "name": "库伦旗",
            "parent_id": "150500",
            "level": "3",
            "full_name": "内蒙古自治区-通辽市-库伦旗"
        },
        {
            "id": "150525",
            "name": "奈曼旗",
            "parent_id": "150500",
            "level": "3",
            "full_name": "内蒙古自治区-通辽市-奈曼旗"
        },
        {
            "id": "150526",
            "name": "扎鲁特旗",
            "parent_id": "150500",
            "level": "3",
            "full_name": "内蒙古自治区-通辽市-扎鲁特旗"
        },
        {
            "id": "150581",
            "name": "霍林郭勒市",
            "parent_id": "150500",
            "level": "3",
            "full_name": "内蒙古自治区-通辽市-霍林郭勒市"
        },
        {
            "id": "150600",
            "name": "鄂尔多斯市",
            "parent_id": "150000",
            "level": "2",
            "full_name": "内蒙古自治区-鄂尔多斯市"
        },
        {
            "id": "150601",
            "name": "市辖区",
            "parent_id": "150600",
            "level": "3",
            "full_name": "内蒙古自治区-鄂尔多斯市-市辖区"
        },
        {
            "id": "150602",
            "name": "东胜区",
            "parent_id": "150600",
            "level": "3",
            "full_name": "内蒙古自治区-鄂尔多斯市-东胜区"
        },
        {
            "id": "150621",
            "name": "达拉特旗",
            "parent_id": "150600",
            "level": "3",
            "full_name": "内蒙古自治区-鄂尔多斯市-达拉特旗"
        },
        {
            "id": "150622",
            "name": "准格尔旗",
            "parent_id": "150600",
            "level": "3",
            "full_name": "内蒙古自治区-鄂尔多斯市-准格尔旗"
        },
        {
            "id": "150623",
            "name": "鄂托克前旗",
            "parent_id": "150600",
            "level": "3",
            "full_name": "内蒙古自治区-鄂尔多斯市-鄂托克前旗"
        },
        {
            "id": "150624",
            "name": "鄂托克旗",
            "parent_id": "150600",
            "level": "3",
            "full_name": "内蒙古自治区-鄂尔多斯市-鄂托克旗"
        },
        {
            "id": "150625",
            "name": "杭锦旗",
            "parent_id": "150600",
            "level": "3",
            "full_name": "内蒙古自治区-鄂尔多斯市-杭锦旗"
        },
        {
            "id": "150626",
            "name": "乌审旗",
            "parent_id": "150600",
            "level": "3",
            "full_name": "内蒙古自治区-鄂尔多斯市-乌审旗"
        },
        {
            "id": "150627",
            "name": "伊金霍洛旗",
            "parent_id": "150600",
            "level": "3",
            "full_name": "内蒙古自治区-鄂尔多斯市-伊金霍洛旗"
        },
        {
            "id": "150700",
            "name": "呼伦贝尔市",
            "parent_id": "150000",
            "level": "2",
            "full_name": "内蒙古自治区-呼伦贝尔市"
        },
        {
            "id": "150701",
            "name": "市辖区",
            "parent_id": "150700",
            "level": "3",
            "full_name": "内蒙古自治区-呼伦贝尔市-市辖区"
        },
        {
            "id": "150702",
            "name": "海拉尔区",
            "parent_id": "150700",
            "level": "3",
            "full_name": "内蒙古自治区-呼伦贝尔市-海拉尔区"
        },
        {
            "id": "150703",
            "name": "扎赉诺尔区",
            "parent_id": "150700",
            "level": "3",
            "full_name": "内蒙古自治区-呼伦贝尔市-扎赉诺尔区"
        },
        {
            "id": "150721",
            "name": "阿荣旗",
            "parent_id": "150700",
            "level": "3",
            "full_name": "内蒙古自治区-呼伦贝尔市-阿荣旗"
        },
        {
            "id": "150722",
            "name": "莫力达瓦达斡尔族自治旗",
            "parent_id": "150700",
            "level": "3",
            "full_name": "内蒙古自治区-呼伦贝尔市-莫力达瓦达斡尔族自治旗"
        },
        {
            "id": "150723",
            "name": "鄂伦春自治旗",
            "parent_id": "150700",
            "level": "3",
            "full_name": "内蒙古自治区-呼伦贝尔市-鄂伦春自治旗"
        },
        {
            "id": "150724",
            "name": "鄂温克族自治旗",
            "parent_id": "150700",
            "level": "3",
            "full_name": "内蒙古自治区-呼伦贝尔市-鄂温克族自治旗"
        },
        {
            "id": "150725",
            "name": "陈巴尔虎旗",
            "parent_id": "150700",
            "level": "3",
            "full_name": "内蒙古自治区-呼伦贝尔市-陈巴尔虎旗"
        },
        {
            "id": "150726",
            "name": "新巴尔虎左旗",
            "parent_id": "150700",
            "level": "3",
            "full_name": "内蒙古自治区-呼伦贝尔市-新巴尔虎左旗"
        },
        {
            "id": "150727",
            "name": "新巴尔虎右旗",
            "parent_id": "150700",
            "level": "3",
            "full_name": "内蒙古自治区-呼伦贝尔市-新巴尔虎右旗"
        },
        {
            "id": "150781",
            "name": "满洲里市",
            "parent_id": "150700",
            "level": "3",
            "full_name": "内蒙古自治区-呼伦贝尔市-满洲里市"
        },
        {
            "id": "150782",
            "name": "牙克石市",
            "parent_id": "150700",
            "level": "3",
            "full_name": "内蒙古自治区-呼伦贝尔市-牙克石市"
        },
        {
            "id": "150783",
            "name": "扎兰屯市",
            "parent_id": "150700",
            "level": "3",
            "full_name": "内蒙古自治区-呼伦贝尔市-扎兰屯市"
        },
        {
            "id": "150784",
            "name": "额尔古纳市",
            "parent_id": "150700",
            "level": "3",
            "full_name": "内蒙古自治区-呼伦贝尔市-额尔古纳市"
        },
        {
            "id": "150785",
            "name": "根河市",
            "parent_id": "150700",
            "level": "3",
            "full_name": "内蒙古自治区-呼伦贝尔市-根河市"
        },
        {
            "id": "150800",
            "name": "巴彦淖尔市",
            "parent_id": "150000",
            "level": "2",
            "full_name": "内蒙古自治区-巴彦淖尔市"
        },
        {
            "id": "150801",
            "name": "市辖区",
            "parent_id": "150800",
            "level": "3",
            "full_name": "内蒙古自治区-巴彦淖尔市-市辖区"
        },
        {
            "id": "150802",
            "name": "临河区",
            "parent_id": "150800",
            "level": "3",
            "full_name": "内蒙古自治区-巴彦淖尔市-临河区"
        },
        {
            "id": "150821",
            "name": "五原县",
            "parent_id": "150800",
            "level": "3",
            "full_name": "内蒙古自治区-巴彦淖尔市-五原县"
        },
        {
            "id": "150822",
            "name": "磴口县",
            "parent_id": "150800",
            "level": "3",
            "full_name": "内蒙古自治区-巴彦淖尔市-磴口县"
        },
        {
            "id": "150823",
            "name": "乌拉特前旗",
            "parent_id": "150800",
            "level": "3",
            "full_name": "内蒙古自治区-巴彦淖尔市-乌拉特前旗"
        },
        {
            "id": "150824",
            "name": "乌拉特中旗",
            "parent_id": "150800",
            "level": "3",
            "full_name": "内蒙古自治区-巴彦淖尔市-乌拉特中旗"
        },
        {
            "id": "150825",
            "name": "乌拉特后旗",
            "parent_id": "150800",
            "level": "3",
            "full_name": "内蒙古自治区-巴彦淖尔市-乌拉特后旗"
        },
        {
            "id": "150826",
            "name": "杭锦后旗",
            "parent_id": "150800",
            "level": "3",
            "full_name": "内蒙古自治区-巴彦淖尔市-杭锦后旗"
        },
        {
            "id": "150900",
            "name": "乌兰察布市",
            "parent_id": "150000",
            "level": "2",
            "full_name": "内蒙古自治区-乌兰察布市"
        },
        {
            "id": "150901",
            "name": "市辖区",
            "parent_id": "150900",
            "level": "3",
            "full_name": "内蒙古自治区-乌兰察布市-市辖区"
        },
        {
            "id": "150902",
            "name": "集宁区",
            "parent_id": "150900",
            "level": "3",
            "full_name": "内蒙古自治区-乌兰察布市-集宁区"
        },
        {
            "id": "150921",
            "name": "卓资县",
            "parent_id": "150900",
            "level": "3",
            "full_name": "内蒙古自治区-乌兰察布市-卓资县"
        },
        {
            "id": "150922",
            "name": "化德县",
            "parent_id": "150900",
            "level": "3",
            "full_name": "内蒙古自治区-乌兰察布市-化德县"
        },
        {
            "id": "150923",
            "name": "商都县",
            "parent_id": "150900",
            "level": "3",
            "full_name": "内蒙古自治区-乌兰察布市-商都县"
        },
        {
            "id": "150924",
            "name": "兴和县",
            "parent_id": "150900",
            "level": "3",
            "full_name": "内蒙古自治区-乌兰察布市-兴和县"
        },
        {
            "id": "150925",
            "name": "凉城县",
            "parent_id": "150900",
            "level": "3",
            "full_name": "内蒙古自治区-乌兰察布市-凉城县"
        },
        {
            "id": "150926",
            "name": "察哈尔右翼前旗",
            "parent_id": "150900",
            "level": "3",
            "full_name": "内蒙古自治区-乌兰察布市-察哈尔右翼前旗"
        },
        {
            "id": "150927",
            "name": "察哈尔右翼中旗",
            "parent_id": "150900",
            "level": "3",
            "full_name": "内蒙古自治区-乌兰察布市-察哈尔右翼中旗"
        },
        {
            "id": "150928",
            "name": "察哈尔右翼后旗",
            "parent_id": "150900",
            "level": "3",
            "full_name": "内蒙古自治区-乌兰察布市-察哈尔右翼后旗"
        },
        {
            "id": "150929",
            "name": "四子王旗",
            "parent_id": "150900",
            "level": "3",
            "full_name": "内蒙古自治区-乌兰察布市-四子王旗"
        },
        {
            "id": "150981",
            "name": "丰镇市",
            "parent_id": "150900",
            "level": "3",
            "full_name": "内蒙古自治区-乌兰察布市-丰镇市"
        },
        {
            "id": "152200",
            "name": "兴安盟",
            "parent_id": "150000",
            "level": "2",
            "full_name": "内蒙古自治区-兴安盟"
        },
        {
            "id": "152201",
            "name": "乌兰浩特市",
            "parent_id": "152200",
            "level": "3",
            "full_name": "内蒙古自治区-兴安盟-乌兰浩特市"
        },
        {
            "id": "152202",
            "name": "阿尔山市",
            "parent_id": "152200",
            "level": "3",
            "full_name": "内蒙古自治区-兴安盟-阿尔山市"
        },
        {
            "id": "152221",
            "name": "科尔沁右翼前旗",
            "parent_id": "152200",
            "level": "3",
            "full_name": "内蒙古自治区-兴安盟-科尔沁右翼前旗"
        },
        {
            "id": "152222",
            "name": "科尔沁右翼中旗",
            "parent_id": "152200",
            "level": "3",
            "full_name": "内蒙古自治区-兴安盟-科尔沁右翼中旗"
        },
        {
            "id": "152223",
            "name": "扎赉特旗",
            "parent_id": "152200",
            "level": "3",
            "full_name": "内蒙古自治区-兴安盟-扎赉特旗"
        },
        {
            "id": "152224",
            "name": "突泉县",
            "parent_id": "152200",
            "level": "3",
            "full_name": "内蒙古自治区-兴安盟-突泉县"
        },
        {
            "id": "152500",
            "name": "锡林郭勒盟",
            "parent_id": "150000",
            "level": "2",
            "full_name": "内蒙古自治区-锡林郭勒盟"
        },
        {
            "id": "152501",
            "name": "二连浩特市",
            "parent_id": "152500",
            "level": "3",
            "full_name": "内蒙古自治区-锡林郭勒盟-二连浩特市"
        },
        {
            "id": "152502",
            "name": "锡林浩特市",
            "parent_id": "152500",
            "level": "3",
            "full_name": "内蒙古自治区-锡林郭勒盟-锡林浩特市"
        },
        {
            "id": "152522",
            "name": "阿巴嘎旗",
            "parent_id": "152500",
            "level": "3",
            "full_name": "内蒙古自治区-锡林郭勒盟-阿巴嘎旗"
        },
        {
            "id": "152523",
            "name": "苏尼特左旗",
            "parent_id": "152500",
            "level": "3",
            "full_name": "内蒙古自治区-锡林郭勒盟-苏尼特左旗"
        },
        {
            "id": "152524",
            "name": "苏尼特右旗",
            "parent_id": "152500",
            "level": "3",
            "full_name": "内蒙古自治区-锡林郭勒盟-苏尼特右旗"
        },
        {
            "id": "152525",
            "name": "东乌珠穆沁旗",
            "parent_id": "152500",
            "level": "3",
            "full_name": "内蒙古自治区-锡林郭勒盟-东乌珠穆沁旗"
        },
        {
            "id": "152526",
            "name": "西乌珠穆沁旗",
            "parent_id": "152500",
            "level": "3",
            "full_name": "内蒙古自治区-锡林郭勒盟-西乌珠穆沁旗"
        },
        {
            "id": "152527",
            "name": "太仆寺旗",
            "parent_id": "152500",
            "level": "3",
            "full_name": "内蒙古自治区-锡林郭勒盟-太仆寺旗"
        },
        {
            "id": "152528",
            "name": "镶黄旗",
            "parent_id": "152500",
            "level": "3",
            "full_name": "内蒙古自治区-锡林郭勒盟-镶黄旗"
        },
        {
            "id": "152529",
            "name": "正镶白旗",
            "parent_id": "152500",
            "level": "3",
            "full_name": "内蒙古自治区-锡林郭勒盟-正镶白旗"
        },
        {
            "id": "152530",
            "name": "正蓝旗",
            "parent_id": "152500",
            "level": "3",
            "full_name": "内蒙古自治区-锡林郭勒盟-正蓝旗"
        },
        {
            "id": "152531",
            "name": "多伦县",
            "parent_id": "152500",
            "level": "3",
            "full_name": "内蒙古自治区-锡林郭勒盟-多伦县"
        },
        {
            "id": "152900",
            "name": "阿拉善盟",
            "parent_id": "150000",
            "level": "2",
            "full_name": "内蒙古自治区-阿拉善盟"
        },
        {
            "id": "152921",
            "name": "阿拉善左旗",
            "parent_id": "152900",
            "level": "3",
            "full_name": "内蒙古自治区-阿拉善盟-阿拉善左旗"
        },
        {
            "id": "152922",
            "name": "阿拉善右旗",
            "parent_id": "152900",
            "level": "3",
            "full_name": "内蒙古自治区-阿拉善盟-阿拉善右旗"
        },
        {
            "id": "152923",
            "name": "额济纳旗",
            "parent_id": "152900",
            "level": "3",
            "full_name": "内蒙古自治区-阿拉善盟-额济纳旗"
        },
        {
            "id": "210000",
            "name": "辽宁省",
            "parent_id": "0",
            "level": "1",
            "full_name": "辽宁省"
        },
        {
            "id": "210100",
            "name": "沈阳市",
            "parent_id": "210000",
            "level": "2",
            "full_name": "辽宁省-沈阳市"
        },
        {
            "id": "210101",
            "name": "市辖区",
            "parent_id": "210100",
            "level": "3",
            "full_name": "辽宁省-沈阳市-市辖区"
        },
        {
            "id": "210102",
            "name": "和平区",
            "parent_id": "210100",
            "level": "3",
            "full_name": "辽宁省-沈阳市-和平区"
        },
        {
            "id": "210103",
            "name": "沈河区",
            "parent_id": "210100",
            "level": "3",
            "full_name": "辽宁省-沈阳市-沈河区"
        },
        {
            "id": "210104",
            "name": "大东区",
            "parent_id": "210100",
            "level": "3",
            "full_name": "辽宁省-沈阳市-大东区"
        },
        {
            "id": "210105",
            "name": "皇姑区",
            "parent_id": "210100",
            "level": "3",
            "full_name": "辽宁省-沈阳市-皇姑区"
        },
        {
            "id": "210106",
            "name": "铁西区",
            "parent_id": "210100",
            "level": "3",
            "full_name": "辽宁省-沈阳市-铁西区"
        },
        {
            "id": "210111",
            "name": "苏家屯区",
            "parent_id": "210100",
            "level": "3",
            "full_name": "辽宁省-沈阳市-苏家屯区"
        },
        {
            "id": "210112",
            "name": "浑南区",
            "parent_id": "210100",
            "level": "3",
            "full_name": "辽宁省-沈阳市-浑南区"
        },
        {
            "id": "210113",
            "name": "沈北新区",
            "parent_id": "210100",
            "level": "3",
            "full_name": "辽宁省-沈阳市-沈北新区"
        },
        {
            "id": "210114",
            "name": "于洪区",
            "parent_id": "210100",
            "level": "3",
            "full_name": "辽宁省-沈阳市-于洪区"
        },
        {
            "id": "210122",
            "name": "辽中县",
            "parent_id": "210100",
            "level": "3",
            "full_name": "辽宁省-沈阳市-辽中县"
        },
        {
            "id": "210123",
            "name": "康平县",
            "parent_id": "210100",
            "level": "3",
            "full_name": "辽宁省-沈阳市-康平县"
        },
        {
            "id": "210124",
            "name": "法库县",
            "parent_id": "210100",
            "level": "3",
            "full_name": "辽宁省-沈阳市-法库县"
        },
        {
            "id": "210181",
            "name": "新民市",
            "parent_id": "210100",
            "level": "3",
            "full_name": "辽宁省-沈阳市-新民市"
        },
        {
            "id": "210200",
            "name": "大连市",
            "parent_id": "210000",
            "level": "2",
            "full_name": "辽宁省-大连市"
        },
        {
            "id": "210201",
            "name": "市辖区",
            "parent_id": "210200",
            "level": "3",
            "full_name": "辽宁省-大连市-市辖区"
        },
        {
            "id": "210202",
            "name": "中山区",
            "parent_id": "210200",
            "level": "3",
            "full_name": "辽宁省-大连市-中山区"
        },
        {
            "id": "210203",
            "name": "西岗区",
            "parent_id": "210200",
            "level": "3",
            "full_name": "辽宁省-大连市-西岗区"
        },
        {
            "id": "210204",
            "name": "沙河口区",
            "parent_id": "210200",
            "level": "3",
            "full_name": "辽宁省-大连市-沙河口区"
        },
        {
            "id": "210211",
            "name": "甘井子区",
            "parent_id": "210200",
            "level": "3",
            "full_name": "辽宁省-大连市-甘井子区"
        },
        {
            "id": "210212",
            "name": "旅顺口区",
            "parent_id": "210200",
            "level": "3",
            "full_name": "辽宁省-大连市-旅顺口区"
        },
        {
            "id": "210213",
            "name": "金州区",
            "parent_id": "210200",
            "level": "3",
            "full_name": "辽宁省-大连市-金州区"
        },
        {
            "id": "210224",
            "name": "长海县",
            "parent_id": "210200",
            "level": "3",
            "full_name": "辽宁省-大连市-长海县"
        },
        {
            "id": "210281",
            "name": "瓦房店市",
            "parent_id": "210200",
            "level": "3",
            "full_name": "辽宁省-大连市-瓦房店市"
        },
        {
            "id": "210282",
            "name": "普兰店市",
            "parent_id": "210200",
            "level": "3",
            "full_name": "辽宁省-大连市-普兰店市"
        },
        {
            "id": "210283",
            "name": "庄河市",
            "parent_id": "210200",
            "level": "3",
            "full_name": "辽宁省-大连市-庄河市"
        },
        {
            "id": "210300",
            "name": "鞍山市",
            "parent_id": "210000",
            "level": "2",
            "full_name": "辽宁省-鞍山市"
        },
        {
            "id": "210301",
            "name": "市辖区",
            "parent_id": "210300",
            "level": "3",
            "full_name": "辽宁省-鞍山市-市辖区"
        },
        {
            "id": "210302",
            "name": "铁东区",
            "parent_id": "210300",
            "level": "3",
            "full_name": "辽宁省-鞍山市-铁东区"
        },
        {
            "id": "210303",
            "name": "铁西区",
            "parent_id": "210300",
            "level": "3",
            "full_name": "辽宁省-鞍山市-铁西区"
        },
        {
            "id": "210304",
            "name": "立山区",
            "parent_id": "210300",
            "level": "3",
            "full_name": "辽宁省-鞍山市-立山区"
        },
        {
            "id": "210311",
            "name": "千山区",
            "parent_id": "210300",
            "level": "3",
            "full_name": "辽宁省-鞍山市-千山区"
        },
        {
            "id": "210321",
            "name": "台安县",
            "parent_id": "210300",
            "level": "3",
            "full_name": "辽宁省-鞍山市-台安县"
        },
        {
            "id": "210323",
            "name": "岫岩满族自治县",
            "parent_id": "210300",
            "level": "3",
            "full_name": "辽宁省-鞍山市-岫岩满族自治县"
        },
        {
            "id": "210381",
            "name": "海城市",
            "parent_id": "210300",
            "level": "3",
            "full_name": "辽宁省-鞍山市-海城市"
        },
        {
            "id": "210400",
            "name": "抚顺市",
            "parent_id": "210000",
            "level": "2",
            "full_name": "辽宁省-抚顺市"
        },
        {
            "id": "210401",
            "name": "市辖区",
            "parent_id": "210400",
            "level": "3",
            "full_name": "辽宁省-抚顺市-市辖区"
        },
        {
            "id": "210402",
            "name": "新抚区",
            "parent_id": "210400",
            "level": "3",
            "full_name": "辽宁省-抚顺市-新抚区"
        },
        {
            "id": "210403",
            "name": "东洲区",
            "parent_id": "210400",
            "level": "3",
            "full_name": "辽宁省-抚顺市-东洲区"
        },
        {
            "id": "210404",
            "name": "望花区",
            "parent_id": "210400",
            "level": "3",
            "full_name": "辽宁省-抚顺市-望花区"
        },
        {
            "id": "210411",
            "name": "顺城区",
            "parent_id": "210400",
            "level": "3",
            "full_name": "辽宁省-抚顺市-顺城区"
        },
        {
            "id": "210421",
            "name": "抚顺县",
            "parent_id": "210400",
            "level": "3",
            "full_name": "辽宁省-抚顺市-抚顺县"
        },
        {
            "id": "210422",
            "name": "新宾满族自治县",
            "parent_id": "210400",
            "level": "3",
            "full_name": "辽宁省-抚顺市-新宾满族自治县"
        },
        {
            "id": "210423",
            "name": "清原满族自治县",
            "parent_id": "210400",
            "level": "3",
            "full_name": "辽宁省-抚顺市-清原满族自治县"
        },
        {
            "id": "210500",
            "name": "本溪市",
            "parent_id": "210000",
            "level": "2",
            "full_name": "辽宁省-本溪市"
        },
        {
            "id": "210501",
            "name": "市辖区",
            "parent_id": "210500",
            "level": "3",
            "full_name": "辽宁省-本溪市-市辖区"
        },
        {
            "id": "210502",
            "name": "平山区",
            "parent_id": "210500",
            "level": "3",
            "full_name": "辽宁省-本溪市-平山区"
        },
        {
            "id": "210503",
            "name": "溪湖区",
            "parent_id": "210500",
            "level": "3",
            "full_name": "辽宁省-本溪市-溪湖区"
        },
        {
            "id": "210504",
            "name": "明山区",
            "parent_id": "210500",
            "level": "3",
            "full_name": "辽宁省-本溪市-明山区"
        },
        {
            "id": "210505",
            "name": "南芬区",
            "parent_id": "210500",
            "level": "3",
            "full_name": "辽宁省-本溪市-南芬区"
        },
        {
            "id": "210521",
            "name": "本溪满族自治县",
            "parent_id": "210500",
            "level": "3",
            "full_name": "辽宁省-本溪市-本溪满族自治县"
        },
        {
            "id": "210522",
            "name": "桓仁满族自治县",
            "parent_id": "210500",
            "level": "3",
            "full_name": "辽宁省-本溪市-桓仁满族自治县"
        },
        {
            "id": "210600",
            "name": "丹东市",
            "parent_id": "210000",
            "level": "2",
            "full_name": "辽宁省-丹东市"
        },
        {
            "id": "210601",
            "name": "市辖区",
            "parent_id": "210600",
            "level": "3",
            "full_name": "辽宁省-丹东市-市辖区"
        },
        {
            "id": "210602",
            "name": "元宝区",
            "parent_id": "210600",
            "level": "3",
            "full_name": "辽宁省-丹东市-元宝区"
        },
        {
            "id": "210603",
            "name": "振兴区",
            "parent_id": "210600",
            "level": "3",
            "full_name": "辽宁省-丹东市-振兴区"
        },
        {
            "id": "210604",
            "name": "振安区",
            "parent_id": "210600",
            "level": "3",
            "full_name": "辽宁省-丹东市-振安区"
        },
        {
            "id": "210624",
            "name": "宽甸满族自治县",
            "parent_id": "210600",
            "level": "3",
            "full_name": "辽宁省-丹东市-宽甸满族自治县"
        },
        {
            "id": "210681",
            "name": "东港市",
            "parent_id": "210600",
            "level": "3",
            "full_name": "辽宁省-丹东市-东港市"
        },
        {
            "id": "210682",
            "name": "凤城市",
            "parent_id": "210600",
            "level": "3",
            "full_name": "辽宁省-丹东市-凤城市"
        },
        {
            "id": "210700",
            "name": "锦州市",
            "parent_id": "210000",
            "level": "2",
            "full_name": "辽宁省-锦州市"
        },
        {
            "id": "210701",
            "name": "市辖区",
            "parent_id": "210700",
            "level": "3",
            "full_name": "辽宁省-锦州市-市辖区"
        },
        {
            "id": "210702",
            "name": "古塔区",
            "parent_id": "210700",
            "level": "3",
            "full_name": "辽宁省-锦州市-古塔区"
        },
        {
            "id": "210703",
            "name": "凌河区",
            "parent_id": "210700",
            "level": "3",
            "full_name": "辽宁省-锦州市-凌河区"
        },
        {
            "id": "210711",
            "name": "太和区",
            "parent_id": "210700",
            "level": "3",
            "full_name": "辽宁省-锦州市-太和区"
        },
        {
            "id": "210726",
            "name": "黑山县",
            "parent_id": "210700",
            "level": "3",
            "full_name": "辽宁省-锦州市-黑山县"
        },
        {
            "id": "210727",
            "name": "义县",
            "parent_id": "210700",
            "level": "3",
            "full_name": "辽宁省-锦州市-义县"
        },
        {
            "id": "210781",
            "name": "凌海市",
            "parent_id": "210700",
            "level": "3",
            "full_name": "辽宁省-锦州市-凌海市"
        },
        {
            "id": "210782",
            "name": "北镇市",
            "parent_id": "210700",
            "level": "3",
            "full_name": "辽宁省-锦州市-北镇市"
        },
        {
            "id": "210800",
            "name": "营口市",
            "parent_id": "210000",
            "level": "2",
            "full_name": "辽宁省-营口市"
        },
        {
            "id": "210801",
            "name": "市辖区",
            "parent_id": "210800",
            "level": "3",
            "full_name": "辽宁省-营口市-市辖区"
        },
        {
            "id": "210802",
            "name": "站前区",
            "parent_id": "210800",
            "level": "3",
            "full_name": "辽宁省-营口市-站前区"
        },
        {
            "id": "210803",
            "name": "西市区",
            "parent_id": "210800",
            "level": "3",
            "full_name": "辽宁省-营口市-西市区"
        },
        {
            "id": "210804",
            "name": "鲅鱼圈区",
            "parent_id": "210800",
            "level": "3",
            "full_name": "辽宁省-营口市-鲅鱼圈区"
        },
        {
            "id": "210811",
            "name": "老边区",
            "parent_id": "210800",
            "level": "3",
            "full_name": "辽宁省-营口市-老边区"
        },
        {
            "id": "210881",
            "name": "盖州市",
            "parent_id": "210800",
            "level": "3",
            "full_name": "辽宁省-营口市-盖州市"
        },
        {
            "id": "210882",
            "name": "大石桥市",
            "parent_id": "210800",
            "level": "3",
            "full_name": "辽宁省-营口市-大石桥市"
        },
        {
            "id": "210900",
            "name": "阜新市",
            "parent_id": "210000",
            "level": "2",
            "full_name": "辽宁省-阜新市"
        },
        {
            "id": "210901",
            "name": "市辖区",
            "parent_id": "210900",
            "level": "3",
            "full_name": "辽宁省-阜新市-市辖区"
        },
        {
            "id": "210902",
            "name": "海州区",
            "parent_id": "210900",
            "level": "3",
            "full_name": "辽宁省-阜新市-海州区"
        },
        {
            "id": "210903",
            "name": "新邱区",
            "parent_id": "210900",
            "level": "3",
            "full_name": "辽宁省-阜新市-新邱区"
        },
        {
            "id": "210904",
            "name": "太平区",
            "parent_id": "210900",
            "level": "3",
            "full_name": "辽宁省-阜新市-太平区"
        },
        {
            "id": "210905",
            "name": "清河门区",
            "parent_id": "210900",
            "level": "3",
            "full_name": "辽宁省-阜新市-清河门区"
        },
        {
            "id": "210911",
            "name": "细河区",
            "parent_id": "210900",
            "level": "3",
            "full_name": "辽宁省-阜新市-细河区"
        },
        {
            "id": "210921",
            "name": "阜新蒙古族自治县",
            "parent_id": "210900",
            "level": "3",
            "full_name": "辽宁省-阜新市-阜新蒙古族自治县"
        },
        {
            "id": "210922",
            "name": "彰武县",
            "parent_id": "210900",
            "level": "3",
            "full_name": "辽宁省-阜新市-彰武县"
        },
        {
            "id": "211000",
            "name": "辽阳市",
            "parent_id": "210000",
            "level": "2",
            "full_name": "辽宁省-辽阳市"
        },
        {
            "id": "211001",
            "name": "市辖区",
            "parent_id": "211000",
            "level": "3",
            "full_name": "辽宁省-辽阳市-市辖区"
        },
        {
            "id": "211002",
            "name": "白塔区",
            "parent_id": "211000",
            "level": "3",
            "full_name": "辽宁省-辽阳市-白塔区"
        },
        {
            "id": "211003",
            "name": "文圣区",
            "parent_id": "211000",
            "level": "3",
            "full_name": "辽宁省-辽阳市-文圣区"
        },
        {
            "id": "211004",
            "name": "宏伟区",
            "parent_id": "211000",
            "level": "3",
            "full_name": "辽宁省-辽阳市-宏伟区"
        },
        {
            "id": "211005",
            "name": "弓长岭区",
            "parent_id": "211000",
            "level": "3",
            "full_name": "辽宁省-辽阳市-弓长岭区"
        },
        {
            "id": "211011",
            "name": "太子河区",
            "parent_id": "211000",
            "level": "3",
            "full_name": "辽宁省-辽阳市-太子河区"
        },
        {
            "id": "211021",
            "name": "辽阳县",
            "parent_id": "211000",
            "level": "3",
            "full_name": "辽宁省-辽阳市-辽阳县"
        },
        {
            "id": "211081",
            "name": "灯塔市",
            "parent_id": "211000",
            "level": "3",
            "full_name": "辽宁省-辽阳市-灯塔市"
        },
        {
            "id": "211100",
            "name": "盘锦市",
            "parent_id": "210000",
            "level": "2",
            "full_name": "辽宁省-盘锦市"
        },
        {
            "id": "211101",
            "name": "市辖区",
            "parent_id": "211100",
            "level": "3",
            "full_name": "辽宁省-盘锦市-市辖区"
        },
        {
            "id": "211102",
            "name": "双台子区",
            "parent_id": "211100",
            "level": "3",
            "full_name": "辽宁省-盘锦市-双台子区"
        },
        {
            "id": "211103",
            "name": "兴隆台区",
            "parent_id": "211100",
            "level": "3",
            "full_name": "辽宁省-盘锦市-兴隆台区"
        },
        {
            "id": "211121",
            "name": "大洼县",
            "parent_id": "211100",
            "level": "3",
            "full_name": "辽宁省-盘锦市-大洼县"
        },
        {
            "id": "211122",
            "name": "盘山县",
            "parent_id": "211100",
            "level": "3",
            "full_name": "辽宁省-盘锦市-盘山县"
        },
        {
            "id": "211200",
            "name": "铁岭市",
            "parent_id": "210000",
            "level": "2",
            "full_name": "辽宁省-铁岭市"
        },
        {
            "id": "211201",
            "name": "市辖区",
            "parent_id": "211200",
            "level": "3",
            "full_name": "辽宁省-铁岭市-市辖区"
        },
        {
            "id": "211202",
            "name": "银州区",
            "parent_id": "211200",
            "level": "3",
            "full_name": "辽宁省-铁岭市-银州区"
        },
        {
            "id": "211204",
            "name": "清河区",
            "parent_id": "211200",
            "level": "3",
            "full_name": "辽宁省-铁岭市-清河区"
        },
        {
            "id": "211221",
            "name": "铁岭县",
            "parent_id": "211200",
            "level": "3",
            "full_name": "辽宁省-铁岭市-铁岭县"
        },
        {
            "id": "211223",
            "name": "西丰县",
            "parent_id": "211200",
            "level": "3",
            "full_name": "辽宁省-铁岭市-西丰县"
        },
        {
            "id": "211224",
            "name": "昌图县",
            "parent_id": "211200",
            "level": "3",
            "full_name": "辽宁省-铁岭市-昌图县"
        },
        {
            "id": "211281",
            "name": "调兵山市",
            "parent_id": "211200",
            "level": "3",
            "full_name": "辽宁省-铁岭市-调兵山市"
        },
        {
            "id": "211282",
            "name": "开原市",
            "parent_id": "211200",
            "level": "3",
            "full_name": "辽宁省-铁岭市-开原市"
        },
        {
            "id": "211300",
            "name": "朝阳市",
            "parent_id": "210000",
            "level": "2",
            "full_name": "辽宁省-朝阳市"
        },
        {
            "id": "211301",
            "name": "市辖区",
            "parent_id": "211300",
            "level": "3",
            "full_name": "辽宁省-朝阳市-市辖区"
        },
        {
            "id": "211302",
            "name": "双塔区",
            "parent_id": "211300",
            "level": "3",
            "full_name": "辽宁省-朝阳市-双塔区"
        },
        {
            "id": "211303",
            "name": "龙城区",
            "parent_id": "211300",
            "level": "3",
            "full_name": "辽宁省-朝阳市-龙城区"
        },
        {
            "id": "211321",
            "name": "朝阳县",
            "parent_id": "211300",
            "level": "3",
            "full_name": "辽宁省-朝阳市-朝阳县"
        },
        {
            "id": "211322",
            "name": "建平县",
            "parent_id": "211300",
            "level": "3",
            "full_name": "辽宁省-朝阳市-建平县"
        },
        {
            "id": "211324",
            "name": "喀喇沁左翼蒙古族自治县",
            "parent_id": "211300",
            "level": "3",
            "full_name": "辽宁省-朝阳市-喀喇沁左翼蒙古族自治县"
        },
        {
            "id": "211381",
            "name": "北票市",
            "parent_id": "211300",
            "level": "3",
            "full_name": "辽宁省-朝阳市-北票市"
        },
        {
            "id": "211382",
            "name": "凌源市",
            "parent_id": "211300",
            "level": "3",
            "full_name": "辽宁省-朝阳市-凌源市"
        },
        {
            "id": "211400",
            "name": "葫芦岛市",
            "parent_id": "210000",
            "level": "2",
            "full_name": "辽宁省-葫芦岛市"
        },
        {
            "id": "211401",
            "name": "市辖区",
            "parent_id": "211400",
            "level": "3",
            "full_name": "辽宁省-葫芦岛市-市辖区"
        },
        {
            "id": "211402",
            "name": "连山区",
            "parent_id": "211400",
            "level": "3",
            "full_name": "辽宁省-葫芦岛市-连山区"
        },
        {
            "id": "211403",
            "name": "龙港区",
            "parent_id": "211400",
            "level": "3",
            "full_name": "辽宁省-葫芦岛市-龙港区"
        },
        {
            "id": "211404",
            "name": "南票区",
            "parent_id": "211400",
            "level": "3",
            "full_name": "辽宁省-葫芦岛市-南票区"
        },
        {
            "id": "211421",
            "name": "绥中县",
            "parent_id": "211400",
            "level": "3",
            "full_name": "辽宁省-葫芦岛市-绥中县"
        },
        {
            "id": "211422",
            "name": "建昌县",
            "parent_id": "211400",
            "level": "3",
            "full_name": "辽宁省-葫芦岛市-建昌县"
        },
        {
            "id": "211481",
            "name": "兴城市",
            "parent_id": "211400",
            "level": "3",
            "full_name": "辽宁省-葫芦岛市-兴城市"
        },
        {
            "id": "220000",
            "name": "吉林省",
            "parent_id": "0",
            "level": "1",
            "full_name": "吉林省"
        },
        {
            "id": "220100",
            "name": "长春市",
            "parent_id": "220000",
            "level": "2",
            "full_name": "吉林省-长春市"
        },
        {
            "id": "220101",
            "name": "市辖区",
            "parent_id": "220100",
            "level": "3",
            "full_name": "吉林省-长春市-市辖区"
        },
        {
            "id": "220102",
            "name": "南关区",
            "parent_id": "220100",
            "level": "3",
            "full_name": "吉林省-长春市-南关区"
        },
        {
            "id": "220103",
            "name": "宽城区",
            "parent_id": "220100",
            "level": "3",
            "full_name": "吉林省-长春市-宽城区"
        },
        {
            "id": "220104",
            "name": "朝阳区",
            "parent_id": "220100",
            "level": "3",
            "full_name": "吉林省-长春市-朝阳区"
        },
        {
            "id": "220105",
            "name": "二道区",
            "parent_id": "220100",
            "level": "3",
            "full_name": "吉林省-长春市-二道区"
        },
        {
            "id": "220106",
            "name": "绿园区",
            "parent_id": "220100",
            "level": "3",
            "full_name": "吉林省-长春市-绿园区"
        },
        {
            "id": "220112",
            "name": "双阳区",
            "parent_id": "220100",
            "level": "3",
            "full_name": "吉林省-长春市-双阳区"
        },
        {
            "id": "220113",
            "name": "九台区",
            "parent_id": "220100",
            "level": "3",
            "full_name": "吉林省-长春市-九台区"
        },
        {
            "id": "220122",
            "name": "农安县",
            "parent_id": "220100",
            "level": "3",
            "full_name": "吉林省-长春市-农安县"
        },
        {
            "id": "220182",
            "name": "榆树市",
            "parent_id": "220100",
            "level": "3",
            "full_name": "吉林省-长春市-榆树市"
        },
        {
            "id": "220183",
            "name": "德惠市",
            "parent_id": "220100",
            "level": "3",
            "full_name": "吉林省-长春市-德惠市"
        },
        {
            "id": "220200",
            "name": "吉林市",
            "parent_id": "220000",
            "level": "2",
            "full_name": "吉林省-吉林市"
        },
        {
            "id": "220201",
            "name": "市辖区",
            "parent_id": "220200",
            "level": "3",
            "full_name": "吉林省-吉林市-市辖区"
        },
        {
            "id": "220202",
            "name": "昌邑区",
            "parent_id": "220200",
            "level": "3",
            "full_name": "吉林省-吉林市-昌邑区"
        },
        {
            "id": "220203",
            "name": "龙潭区",
            "parent_id": "220200",
            "level": "3",
            "full_name": "吉林省-吉林市-龙潭区"
        },
        {
            "id": "220204",
            "name": "船营区",
            "parent_id": "220200",
            "level": "3",
            "full_name": "吉林省-吉林市-船营区"
        },
        {
            "id": "220211",
            "name": "丰满区",
            "parent_id": "220200",
            "level": "3",
            "full_name": "吉林省-吉林市-丰满区"
        },
        {
            "id": "220221",
            "name": "永吉县",
            "parent_id": "220200",
            "level": "3",
            "full_name": "吉林省-吉林市-永吉县"
        },
        {
            "id": "220281",
            "name": "蛟河市",
            "parent_id": "220200",
            "level": "3",
            "full_name": "吉林省-吉林市-蛟河市"
        },
        {
            "id": "220282",
            "name": "桦甸市",
            "parent_id": "220200",
            "level": "3",
            "full_name": "吉林省-吉林市-桦甸市"
        },
        {
            "id": "220283",
            "name": "舒兰市",
            "parent_id": "220200",
            "level": "3",
            "full_name": "吉林省-吉林市-舒兰市"
        },
        {
            "id": "220284",
            "name": "磐石市",
            "parent_id": "220200",
            "level": "3",
            "full_name": "吉林省-吉林市-磐石市"
        },
        {
            "id": "220300",
            "name": "四平市",
            "parent_id": "220000",
            "level": "2",
            "full_name": "吉林省-四平市"
        },
        {
            "id": "220301",
            "name": "市辖区",
            "parent_id": "220300",
            "level": "3",
            "full_name": "吉林省-四平市-市辖区"
        },
        {
            "id": "220302",
            "name": "铁西区",
            "parent_id": "220300",
            "level": "3",
            "full_name": "吉林省-四平市-铁西区"
        },
        {
            "id": "220303",
            "name": "铁东区",
            "parent_id": "220300",
            "level": "3",
            "full_name": "吉林省-四平市-铁东区"
        },
        {
            "id": "220322",
            "name": "梨树县",
            "parent_id": "220300",
            "level": "3",
            "full_name": "吉林省-四平市-梨树县"
        },
        {
            "id": "220323",
            "name": "伊通满族自治县",
            "parent_id": "220300",
            "level": "3",
            "full_name": "吉林省-四平市-伊通满族自治县"
        },
        {
            "id": "220381",
            "name": "公主岭市",
            "parent_id": "220300",
            "level": "3",
            "full_name": "吉林省-四平市-公主岭市"
        },
        {
            "id": "220382",
            "name": "双辽市",
            "parent_id": "220300",
            "level": "3",
            "full_name": "吉林省-四平市-双辽市"
        },
        {
            "id": "220400",
            "name": "辽源市",
            "parent_id": "220000",
            "level": "2",
            "full_name": "吉林省-辽源市"
        },
        {
            "id": "220401",
            "name": "市辖区",
            "parent_id": "220400",
            "level": "3",
            "full_name": "吉林省-辽源市-市辖区"
        },
        {
            "id": "220402",
            "name": "龙山区",
            "parent_id": "220400",
            "level": "3",
            "full_name": "吉林省-辽源市-龙山区"
        },
        {
            "id": "220403",
            "name": "西安区",
            "parent_id": "220400",
            "level": "3",
            "full_name": "吉林省-辽源市-西安区"
        },
        {
            "id": "220421",
            "name": "东丰县",
            "parent_id": "220400",
            "level": "3",
            "full_name": "吉林省-辽源市-东丰县"
        },
        {
            "id": "220422",
            "name": "东辽县",
            "parent_id": "220400",
            "level": "3",
            "full_name": "吉林省-辽源市-东辽县"
        },
        {
            "id": "220500",
            "name": "通化市",
            "parent_id": "220000",
            "level": "2",
            "full_name": "吉林省-通化市"
        },
        {
            "id": "220501",
            "name": "市辖区",
            "parent_id": "220500",
            "level": "3",
            "full_name": "吉林省-通化市-市辖区"
        },
        {
            "id": "220502",
            "name": "东昌区",
            "parent_id": "220500",
            "level": "3",
            "full_name": "吉林省-通化市-东昌区"
        },
        {
            "id": "220503",
            "name": "二道江区",
            "parent_id": "220500",
            "level": "3",
            "full_name": "吉林省-通化市-二道江区"
        },
        {
            "id": "220521",
            "name": "通化县",
            "parent_id": "220500",
            "level": "3",
            "full_name": "吉林省-通化市-通化县"
        },
        {
            "id": "220523",
            "name": "辉南县",
            "parent_id": "220500",
            "level": "3",
            "full_name": "吉林省-通化市-辉南县"
        },
        {
            "id": "220524",
            "name": "柳河县",
            "parent_id": "220500",
            "level": "3",
            "full_name": "吉林省-通化市-柳河县"
        },
        {
            "id": "220581",
            "name": "梅河口市",
            "parent_id": "220500",
            "level": "3",
            "full_name": "吉林省-通化市-梅河口市"
        },
        {
            "id": "220582",
            "name": "集安市",
            "parent_id": "220500",
            "level": "3",
            "full_name": "吉林省-通化市-集安市"
        },
        {
            "id": "220600",
            "name": "白山市",
            "parent_id": "220000",
            "level": "2",
            "full_name": "吉林省-白山市"
        },
        {
            "id": "220601",
            "name": "市辖区",
            "parent_id": "220600",
            "level": "3",
            "full_name": "吉林省-白山市-市辖区"
        },
        {
            "id": "220602",
            "name": "浑江区",
            "parent_id": "220600",
            "level": "3",
            "full_name": "吉林省-白山市-浑江区"
        },
        {
            "id": "220605",
            "name": "江源区",
            "parent_id": "220600",
            "level": "3",
            "full_name": "吉林省-白山市-江源区"
        },
        {
            "id": "220621",
            "name": "抚松县",
            "parent_id": "220600",
            "level": "3",
            "full_name": "吉林省-白山市-抚松县"
        },
        {
            "id": "220622",
            "name": "靖宇县",
            "parent_id": "220600",
            "level": "3",
            "full_name": "吉林省-白山市-靖宇县"
        },
        {
            "id": "220623",
            "name": "长白朝鲜族自治县",
            "parent_id": "220600",
            "level": "3",
            "full_name": "吉林省-白山市-长白朝鲜族自治县"
        },
        {
            "id": "220681",
            "name": "临江市",
            "parent_id": "220600",
            "level": "3",
            "full_name": "吉林省-白山市-临江市"
        },
        {
            "id": "220700",
            "name": "松原市",
            "parent_id": "220000",
            "level": "2",
            "full_name": "吉林省-松原市"
        },
        {
            "id": "220701",
            "name": "市辖区",
            "parent_id": "220700",
            "level": "3",
            "full_name": "吉林省-松原市-市辖区"
        },
        {
            "id": "220702",
            "name": "宁江区",
            "parent_id": "220700",
            "level": "3",
            "full_name": "吉林省-松原市-宁江区"
        },
        {
            "id": "220721",
            "name": "前郭尔罗斯蒙古族自治县",
            "parent_id": "220700",
            "level": "3",
            "full_name": "吉林省-松原市-前郭尔罗斯蒙古族自治县"
        },
        {
            "id": "220722",
            "name": "长岭县",
            "parent_id": "220700",
            "level": "3",
            "full_name": "吉林省-松原市-长岭县"
        },
        {
            "id": "220723",
            "name": "乾安县",
            "parent_id": "220700",
            "level": "3",
            "full_name": "吉林省-松原市-乾安县"
        },
        {
            "id": "220781",
            "name": "扶余市",
            "parent_id": "220700",
            "level": "3",
            "full_name": "吉林省-松原市-扶余市"
        },
        {
            "id": "220800",
            "name": "白城市",
            "parent_id": "220000",
            "level": "2",
            "full_name": "吉林省-白城市"
        },
        {
            "id": "220801",
            "name": "市辖区",
            "parent_id": "220800",
            "level": "3",
            "full_name": "吉林省-白城市-市辖区"
        },
        {
            "id": "220802",
            "name": "洮北区",
            "parent_id": "220800",
            "level": "3",
            "full_name": "吉林省-白城市-洮北区"
        },
        {
            "id": "220821",
            "name": "镇赉县",
            "parent_id": "220800",
            "level": "3",
            "full_name": "吉林省-白城市-镇赉县"
        },
        {
            "id": "220822",
            "name": "通榆县",
            "parent_id": "220800",
            "level": "3",
            "full_name": "吉林省-白城市-通榆县"
        },
        {
            "id": "220881",
            "name": "洮南市",
            "parent_id": "220800",
            "level": "3",
            "full_name": "吉林省-白城市-洮南市"
        },
        {
            "id": "220882",
            "name": "大安市",
            "parent_id": "220800",
            "level": "3",
            "full_name": "吉林省-白城市-大安市"
        },
        {
            "id": "222400",
            "name": "延边朝鲜族自治州",
            "parent_id": "220000",
            "level": "2",
            "full_name": "吉林省-延边朝鲜族自治州"
        },
        {
            "id": "222401",
            "name": "延吉市",
            "parent_id": "222400",
            "level": "3",
            "full_name": "吉林省-延边朝鲜族自治州-延吉市"
        },
        {
            "id": "222402",
            "name": "图们市",
            "parent_id": "222400",
            "level": "3",
            "full_name": "吉林省-延边朝鲜族自治州-图们市"
        },
        {
            "id": "222403",
            "name": "敦化市",
            "parent_id": "222400",
            "level": "3",
            "full_name": "吉林省-延边朝鲜族自治州-敦化市"
        },
        {
            "id": "222404",
            "name": "珲春市",
            "parent_id": "222400",
            "level": "3",
            "full_name": "吉林省-延边朝鲜族自治州-珲春市"
        },
        {
            "id": "222405",
            "name": "龙井市",
            "parent_id": "222400",
            "level": "3",
            "full_name": "吉林省-延边朝鲜族自治州-龙井市"
        },
        {
            "id": "222406",
            "name": "和龙市",
            "parent_id": "222400",
            "level": "3",
            "full_name": "吉林省-延边朝鲜族自治州-和龙市"
        },
        {
            "id": "222424",
            "name": "汪清县",
            "parent_id": "222400",
            "level": "3",
            "full_name": "吉林省-延边朝鲜族自治州-汪清县"
        },
        {
            "id": "222426",
            "name": "安图县",
            "parent_id": "222400",
            "level": "3",
            "full_name": "吉林省-延边朝鲜族自治州-安图县"
        },
        {
            "id": "230000",
            "name": "黑龙江省",
            "parent_id": "0",
            "level": "1",
            "full_name": "黑龙江省"
        },
        {
            "id": "230100",
            "name": "哈尔滨市",
            "parent_id": "230000",
            "level": "2",
            "full_name": "黑龙江省-哈尔滨市"
        },
        {
            "id": "230101",
            "name": "市辖区",
            "parent_id": "230100",
            "level": "3",
            "full_name": "黑龙江省-哈尔滨市-市辖区"
        },
        {
            "id": "230102",
            "name": "道里区",
            "parent_id": "230100",
            "level": "3",
            "full_name": "黑龙江省-哈尔滨市-道里区"
        },
        {
            "id": "230103",
            "name": "南岗区",
            "parent_id": "230100",
            "level": "3",
            "full_name": "黑龙江省-哈尔滨市-南岗区"
        },
        {
            "id": "230104",
            "name": "道外区",
            "parent_id": "230100",
            "level": "3",
            "full_name": "黑龙江省-哈尔滨市-道外区"
        },
        {
            "id": "230108",
            "name": "平房区",
            "parent_id": "230100",
            "level": "3",
            "full_name": "黑龙江省-哈尔滨市-平房区"
        },
        {
            "id": "230109",
            "name": "松北区",
            "parent_id": "230100",
            "level": "3",
            "full_name": "黑龙江省-哈尔滨市-松北区"
        },
        {
            "id": "230110",
            "name": "香坊区",
            "parent_id": "230100",
            "level": "3",
            "full_name": "黑龙江省-哈尔滨市-香坊区"
        },
        {
            "id": "230111",
            "name": "呼兰区",
            "parent_id": "230100",
            "level": "3",
            "full_name": "黑龙江省-哈尔滨市-呼兰区"
        },
        {
            "id": "230112",
            "name": "阿城区",
            "parent_id": "230100",
            "level": "3",
            "full_name": "黑龙江省-哈尔滨市-阿城区"
        },
        {
            "id": "230113",
            "name": "双城区",
            "parent_id": "230100",
            "level": "3",
            "full_name": "黑龙江省-哈尔滨市-双城区"
        },
        {
            "id": "230123",
            "name": "依兰县",
            "parent_id": "230100",
            "level": "3",
            "full_name": "黑龙江省-哈尔滨市-依兰县"
        },
        {
            "id": "230124",
            "name": "方正县",
            "parent_id": "230100",
            "level": "3",
            "full_name": "黑龙江省-哈尔滨市-方正县"
        },
        {
            "id": "230125",
            "name": "宾县",
            "parent_id": "230100",
            "level": "3",
            "full_name": "黑龙江省-哈尔滨市-宾县"
        },
        {
            "id": "230126",
            "name": "巴彦县",
            "parent_id": "230100",
            "level": "3",
            "full_name": "黑龙江省-哈尔滨市-巴彦县"
        },
        {
            "id": "230127",
            "name": "木兰县",
            "parent_id": "230100",
            "level": "3",
            "full_name": "黑龙江省-哈尔滨市-木兰县"
        },
        {
            "id": "230128",
            "name": "通河县",
            "parent_id": "230100",
            "level": "3",
            "full_name": "黑龙江省-哈尔滨市-通河县"
        },
        {
            "id": "230129",
            "name": "延寿县",
            "parent_id": "230100",
            "level": "3",
            "full_name": "黑龙江省-哈尔滨市-延寿县"
        },
        {
            "id": "230183",
            "name": "尚志市",
            "parent_id": "230100",
            "level": "3",
            "full_name": "黑龙江省-哈尔滨市-尚志市"
        },
        {
            "id": "230184",
            "name": "五常市",
            "parent_id": "230100",
            "level": "3",
            "full_name": "黑龙江省-哈尔滨市-五常市"
        },
        {
            "id": "230200",
            "name": "齐齐哈尔市",
            "parent_id": "230000",
            "level": "2",
            "full_name": "黑龙江省-齐齐哈尔市"
        },
        {
            "id": "230201",
            "name": "市辖区",
            "parent_id": "230200",
            "level": "3",
            "full_name": "黑龙江省-齐齐哈尔市-市辖区"
        },
        {
            "id": "230202",
            "name": "龙沙区",
            "parent_id": "230200",
            "level": "3",
            "full_name": "黑龙江省-齐齐哈尔市-龙沙区"
        },
        {
            "id": "230203",
            "name": "建华区",
            "parent_id": "230200",
            "level": "3",
            "full_name": "黑龙江省-齐齐哈尔市-建华区"
        },
        {
            "id": "230204",
            "name": "铁锋区",
            "parent_id": "230200",
            "level": "3",
            "full_name": "黑龙江省-齐齐哈尔市-铁锋区"
        },
        {
            "id": "230205",
            "name": "昂昂溪区",
            "parent_id": "230200",
            "level": "3",
            "full_name": "黑龙江省-齐齐哈尔市-昂昂溪区"
        },
        {
            "id": "230206",
            "name": "富拉尔基区",
            "parent_id": "230200",
            "level": "3",
            "full_name": "黑龙江省-齐齐哈尔市-富拉尔基区"
        },
        {
            "id": "230207",
            "name": "碾子山区",
            "parent_id": "230200",
            "level": "3",
            "full_name": "黑龙江省-齐齐哈尔市-碾子山区"
        },
        {
            "id": "230208",
            "name": "梅里斯达斡尔族区",
            "parent_id": "230200",
            "level": "3",
            "full_name": "黑龙江省-齐齐哈尔市-梅里斯达斡尔族区"
        },
        {
            "id": "230221",
            "name": "龙江县",
            "parent_id": "230200",
            "level": "3",
            "full_name": "黑龙江省-齐齐哈尔市-龙江县"
        },
        {
            "id": "230223",
            "name": "依安县",
            "parent_id": "230200",
            "level": "3",
            "full_name": "黑龙江省-齐齐哈尔市-依安县"
        },
        {
            "id": "230224",
            "name": "泰来县",
            "parent_id": "230200",
            "level": "3",
            "full_name": "黑龙江省-齐齐哈尔市-泰来县"
        },
        {
            "id": "230225",
            "name": "甘南县",
            "parent_id": "230200",
            "level": "3",
            "full_name": "黑龙江省-齐齐哈尔市-甘南县"
        },
        {
            "id": "230227",
            "name": "富裕县",
            "parent_id": "230200",
            "level": "3",
            "full_name": "黑龙江省-齐齐哈尔市-富裕县"
        },
        {
            "id": "230229",
            "name": "克山县",
            "parent_id": "230200",
            "level": "3",
            "full_name": "黑龙江省-齐齐哈尔市-克山县"
        },
        {
            "id": "230230",
            "name": "克东县",
            "parent_id": "230200",
            "level": "3",
            "full_name": "黑龙江省-齐齐哈尔市-克东县"
        },
        {
            "id": "230231",
            "name": "拜泉县",
            "parent_id": "230200",
            "level": "3",
            "full_name": "黑龙江省-齐齐哈尔市-拜泉县"
        },
        {
            "id": "230281",
            "name": "讷河市",
            "parent_id": "230200",
            "level": "3",
            "full_name": "黑龙江省-齐齐哈尔市-讷河市"
        },
        {
            "id": "230300",
            "name": "鸡西市",
            "parent_id": "230000",
            "level": "2",
            "full_name": "黑龙江省-鸡西市"
        },
        {
            "id": "230301",
            "name": "市辖区",
            "parent_id": "230300",
            "level": "3",
            "full_name": "黑龙江省-鸡西市-市辖区"
        },
        {
            "id": "230302",
            "name": "鸡冠区",
            "parent_id": "230300",
            "level": "3",
            "full_name": "黑龙江省-鸡西市-鸡冠区"
        },
        {
            "id": "230303",
            "name": "恒山区",
            "parent_id": "230300",
            "level": "3",
            "full_name": "黑龙江省-鸡西市-恒山区"
        },
        {
            "id": "230304",
            "name": "滴道区",
            "parent_id": "230300",
            "level": "3",
            "full_name": "黑龙江省-鸡西市-滴道区"
        },
        {
            "id": "230305",
            "name": "梨树区",
            "parent_id": "230300",
            "level": "3",
            "full_name": "黑龙江省-鸡西市-梨树区"
        },
        {
            "id": "230306",
            "name": "城子河区",
            "parent_id": "230300",
            "level": "3",
            "full_name": "黑龙江省-鸡西市-城子河区"
        },
        {
            "id": "230307",
            "name": "麻山区",
            "parent_id": "230300",
            "level": "3",
            "full_name": "黑龙江省-鸡西市-麻山区"
        },
        {
            "id": "230321",
            "name": "鸡东县",
            "parent_id": "230300",
            "level": "3",
            "full_name": "黑龙江省-鸡西市-鸡东县"
        },
        {
            "id": "230381",
            "name": "虎林市",
            "parent_id": "230300",
            "level": "3",
            "full_name": "黑龙江省-鸡西市-虎林市"
        },
        {
            "id": "230382",
            "name": "密山市",
            "parent_id": "230300",
            "level": "3",
            "full_name": "黑龙江省-鸡西市-密山市"
        },
        {
            "id": "230400",
            "name": "鹤岗市",
            "parent_id": "230000",
            "level": "2",
            "full_name": "黑龙江省-鹤岗市"
        },
        {
            "id": "230401",
            "name": "市辖区",
            "parent_id": "230400",
            "level": "3",
            "full_name": "黑龙江省-鹤岗市-市辖区"
        },
        {
            "id": "230402",
            "name": "向阳区",
            "parent_id": "230400",
            "level": "3",
            "full_name": "黑龙江省-鹤岗市-向阳区"
        },
        {
            "id": "230403",
            "name": "工农区",
            "parent_id": "230400",
            "level": "3",
            "full_name": "黑龙江省-鹤岗市-工农区"
        },
        {
            "id": "230404",
            "name": "南山区",
            "parent_id": "230400",
            "level": "3",
            "full_name": "黑龙江省-鹤岗市-南山区"
        },
        {
            "id": "230405",
            "name": "兴安区",
            "parent_id": "230400",
            "level": "3",
            "full_name": "黑龙江省-鹤岗市-兴安区"
        },
        {
            "id": "230406",
            "name": "东山区",
            "parent_id": "230400",
            "level": "3",
            "full_name": "黑龙江省-鹤岗市-东山区"
        },
        {
            "id": "230407",
            "name": "兴山区",
            "parent_id": "230400",
            "level": "3",
            "full_name": "黑龙江省-鹤岗市-兴山区"
        },
        {
            "id": "230421",
            "name": "萝北县",
            "parent_id": "230400",
            "level": "3",
            "full_name": "黑龙江省-鹤岗市-萝北县"
        },
        {
            "id": "230422",
            "name": "绥滨县",
            "parent_id": "230400",
            "level": "3",
            "full_name": "黑龙江省-鹤岗市-绥滨县"
        },
        {
            "id": "230500",
            "name": "双鸭山市",
            "parent_id": "230000",
            "level": "2",
            "full_name": "黑龙江省-双鸭山市"
        },
        {
            "id": "230501",
            "name": "市辖区",
            "parent_id": "230500",
            "level": "3",
            "full_name": "黑龙江省-双鸭山市-市辖区"
        },
        {
            "id": "230502",
            "name": "尖山区",
            "parent_id": "230500",
            "level": "3",
            "full_name": "黑龙江省-双鸭山市-尖山区"
        },
        {
            "id": "230503",
            "name": "岭东区",
            "parent_id": "230500",
            "level": "3",
            "full_name": "黑龙江省-双鸭山市-岭东区"
        },
        {
            "id": "230505",
            "name": "四方台区",
            "parent_id": "230500",
            "level": "3",
            "full_name": "黑龙江省-双鸭山市-四方台区"
        },
        {
            "id": "230506",
            "name": "宝山区",
            "parent_id": "230500",
            "level": "3",
            "full_name": "黑龙江省-双鸭山市-宝山区"
        },
        {
            "id": "230521",
            "name": "集贤县",
            "parent_id": "230500",
            "level": "3",
            "full_name": "黑龙江省-双鸭山市-集贤县"
        },
        {
            "id": "230522",
            "name": "友谊县",
            "parent_id": "230500",
            "level": "3",
            "full_name": "黑龙江省-双鸭山市-友谊县"
        },
        {
            "id": "230523",
            "name": "宝清县",
            "parent_id": "230500",
            "level": "3",
            "full_name": "黑龙江省-双鸭山市-宝清县"
        },
        {
            "id": "230524",
            "name": "饶河县",
            "parent_id": "230500",
            "level": "3",
            "full_name": "黑龙江省-双鸭山市-饶河县"
        },
        {
            "id": "230600",
            "name": "大庆市",
            "parent_id": "230000",
            "level": "2",
            "full_name": "黑龙江省-大庆市"
        },
        {
            "id": "230601",
            "name": "市辖区",
            "parent_id": "230600",
            "level": "3",
            "full_name": "黑龙江省-大庆市-市辖区"
        },
        {
            "id": "230602",
            "name": "萨尔图区",
            "parent_id": "230600",
            "level": "3",
            "full_name": "黑龙江省-大庆市-萨尔图区"
        },
        {
            "id": "230603",
            "name": "龙凤区",
            "parent_id": "230600",
            "level": "3",
            "full_name": "黑龙江省-大庆市-龙凤区"
        },
        {
            "id": "230604",
            "name": "让胡路区",
            "parent_id": "230600",
            "level": "3",
            "full_name": "黑龙江省-大庆市-让胡路区"
        },
        {
            "id": "230605",
            "name": "红岗区",
            "parent_id": "230600",
            "level": "3",
            "full_name": "黑龙江省-大庆市-红岗区"
        },
        {
            "id": "230606",
            "name": "大同区",
            "parent_id": "230600",
            "level": "3",
            "full_name": "黑龙江省-大庆市-大同区"
        },
        {
            "id": "230621",
            "name": "肇州县",
            "parent_id": "230600",
            "level": "3",
            "full_name": "黑龙江省-大庆市-肇州县"
        },
        {
            "id": "230622",
            "name": "肇源县",
            "parent_id": "230600",
            "level": "3",
            "full_name": "黑龙江省-大庆市-肇源县"
        },
        {
            "id": "230623",
            "name": "林甸县",
            "parent_id": "230600",
            "level": "3",
            "full_name": "黑龙江省-大庆市-林甸县"
        },
        {
            "id": "230624",
            "name": "杜尔伯特蒙古族自治县",
            "parent_id": "230600",
            "level": "3",
            "full_name": "黑龙江省-大庆市-杜尔伯特蒙古族自治县"
        },
        {
            "id": "230700",
            "name": "伊春市",
            "parent_id": "230000",
            "level": "2",
            "full_name": "黑龙江省-伊春市"
        },
        {
            "id": "230701",
            "name": "市辖区",
            "parent_id": "230700",
            "level": "3",
            "full_name": "黑龙江省-伊春市-市辖区"
        },
        {
            "id": "230702",
            "name": "伊春区",
            "parent_id": "230700",
            "level": "3",
            "full_name": "黑龙江省-伊春市-伊春区"
        },
        {
            "id": "230703",
            "name": "南岔区",
            "parent_id": "230700",
            "level": "3",
            "full_name": "黑龙江省-伊春市-南岔区"
        },
        {
            "id": "230704",
            "name": "友好区",
            "parent_id": "230700",
            "level": "3",
            "full_name": "黑龙江省-伊春市-友好区"
        },
        {
            "id": "230705",
            "name": "西林区",
            "parent_id": "230700",
            "level": "3",
            "full_name": "黑龙江省-伊春市-西林区"
        },
        {
            "id": "230706",
            "name": "翠峦区",
            "parent_id": "230700",
            "level": "3",
            "full_name": "黑龙江省-伊春市-翠峦区"
        },
        {
            "id": "230707",
            "name": "新青区",
            "parent_id": "230700",
            "level": "3",
            "full_name": "黑龙江省-伊春市-新青区"
        },
        {
            "id": "230708",
            "name": "美溪区",
            "parent_id": "230700",
            "level": "3",
            "full_name": "黑龙江省-伊春市-美溪区"
        },
        {
            "id": "230709",
            "name": "金山屯区",
            "parent_id": "230700",
            "level": "3",
            "full_name": "黑龙江省-伊春市-金山屯区"
        },
        {
            "id": "230710",
            "name": "五营区",
            "parent_id": "230700",
            "level": "3",
            "full_name": "黑龙江省-伊春市-五营区"
        },
        {
            "id": "230711",
            "name": "乌马河区",
            "parent_id": "230700",
            "level": "3",
            "full_name": "黑龙江省-伊春市-乌马河区"
        },
        {
            "id": "230712",
            "name": "汤旺河区",
            "parent_id": "230700",
            "level": "3",
            "full_name": "黑龙江省-伊春市-汤旺河区"
        },
        {
            "id": "230713",
            "name": "带岭区",
            "parent_id": "230700",
            "level": "3",
            "full_name": "黑龙江省-伊春市-带岭区"
        },
        {
            "id": "230714",
            "name": "乌伊岭区",
            "parent_id": "230700",
            "level": "3",
            "full_name": "黑龙江省-伊春市-乌伊岭区"
        },
        {
            "id": "230715",
            "name": "红星区",
            "parent_id": "230700",
            "level": "3",
            "full_name": "黑龙江省-伊春市-红星区"
        },
        {
            "id": "230716",
            "name": "上甘岭区",
            "parent_id": "230700",
            "level": "3",
            "full_name": "黑龙江省-伊春市-上甘岭区"
        },
        {
            "id": "230722",
            "name": "嘉荫县",
            "parent_id": "230700",
            "level": "3",
            "full_name": "黑龙江省-伊春市-嘉荫县"
        },
        {
            "id": "230781",
            "name": "铁力市",
            "parent_id": "230700",
            "level": "3",
            "full_name": "黑龙江省-伊春市-铁力市"
        },
        {
            "id": "230800",
            "name": "佳木斯市",
            "parent_id": "230000",
            "level": "2",
            "full_name": "黑龙江省-佳木斯市"
        },
        {
            "id": "230801",
            "name": "市辖区",
            "parent_id": "230800",
            "level": "3",
            "full_name": "黑龙江省-佳木斯市-市辖区"
        },
        {
            "id": "230803",
            "name": "向阳区",
            "parent_id": "230800",
            "level": "3",
            "full_name": "黑龙江省-佳木斯市-向阳区"
        },
        {
            "id": "230804",
            "name": "前进区",
            "parent_id": "230800",
            "level": "3",
            "full_name": "黑龙江省-佳木斯市-前进区"
        },
        {
            "id": "230805",
            "name": "东风区",
            "parent_id": "230800",
            "level": "3",
            "full_name": "黑龙江省-佳木斯市-东风区"
        },
        {
            "id": "230811",
            "name": "郊区",
            "parent_id": "230800",
            "level": "3",
            "full_name": "黑龙江省-佳木斯市-郊区"
        },
        {
            "id": "230822",
            "name": "桦南县",
            "parent_id": "230800",
            "level": "3",
            "full_name": "黑龙江省-佳木斯市-桦南县"
        },
        {
            "id": "230826",
            "name": "桦川县",
            "parent_id": "230800",
            "level": "3",
            "full_name": "黑龙江省-佳木斯市-桦川县"
        },
        {
            "id": "230828",
            "name": "汤原县",
            "parent_id": "230800",
            "level": "3",
            "full_name": "黑龙江省-佳木斯市-汤原县"
        },
        {
            "id": "230833",
            "name": "抚远县",
            "parent_id": "230800",
            "level": "3",
            "full_name": "黑龙江省-佳木斯市-抚远县"
        },
        {
            "id": "230881",
            "name": "同江市",
            "parent_id": "230800",
            "level": "3",
            "full_name": "黑龙江省-佳木斯市-同江市"
        },
        {
            "id": "230882",
            "name": "富锦市",
            "parent_id": "230800",
            "level": "3",
            "full_name": "黑龙江省-佳木斯市-富锦市"
        },
        {
            "id": "230900",
            "name": "七台河市",
            "parent_id": "230000",
            "level": "2",
            "full_name": "黑龙江省-七台河市"
        },
        {
            "id": "230901",
            "name": "市辖区",
            "parent_id": "230900",
            "level": "3",
            "full_name": "黑龙江省-七台河市-市辖区"
        },
        {
            "id": "230902",
            "name": "新兴区",
            "parent_id": "230900",
            "level": "3",
            "full_name": "黑龙江省-七台河市-新兴区"
        },
        {
            "id": "230903",
            "name": "桃山区",
            "parent_id": "230900",
            "level": "3",
            "full_name": "黑龙江省-七台河市-桃山区"
        },
        {
            "id": "230904",
            "name": "茄子河区",
            "parent_id": "230900",
            "level": "3",
            "full_name": "黑龙江省-七台河市-茄子河区"
        },
        {
            "id": "230921",
            "name": "勃利县",
            "parent_id": "230900",
            "level": "3",
            "full_name": "黑龙江省-七台河市-勃利县"
        },
        {
            "id": "231000",
            "name": "牡丹江市",
            "parent_id": "230000",
            "level": "2",
            "full_name": "黑龙江省-牡丹江市"
        },
        {
            "id": "231001",
            "name": "市辖区",
            "parent_id": "231000",
            "level": "3",
            "full_name": "黑龙江省-牡丹江市-市辖区"
        },
        {
            "id": "231002",
            "name": "东安区",
            "parent_id": "231000",
            "level": "3",
            "full_name": "黑龙江省-牡丹江市-东安区"
        },
        {
            "id": "231003",
            "name": "阳明区",
            "parent_id": "231000",
            "level": "3",
            "full_name": "黑龙江省-牡丹江市-阳明区"
        },
        {
            "id": "231004",
            "name": "爱民区",
            "parent_id": "231000",
            "level": "3",
            "full_name": "黑龙江省-牡丹江市-爱民区"
        },
        {
            "id": "231005",
            "name": "西安区",
            "parent_id": "231000",
            "level": "3",
            "full_name": "黑龙江省-牡丹江市-西安区"
        },
        {
            "id": "231024",
            "name": "东宁县",
            "parent_id": "231000",
            "level": "3",
            "full_name": "黑龙江省-牡丹江市-东宁县"
        },
        {
            "id": "231025",
            "name": "林口县",
            "parent_id": "231000",
            "level": "3",
            "full_name": "黑龙江省-牡丹江市-林口县"
        },
        {
            "id": "231081",
            "name": "绥芬河市",
            "parent_id": "231000",
            "level": "3",
            "full_name": "黑龙江省-牡丹江市-绥芬河市"
        },
        {
            "id": "231083",
            "name": "海林市",
            "parent_id": "231000",
            "level": "3",
            "full_name": "黑龙江省-牡丹江市-海林市"
        },
        {
            "id": "231084",
            "name": "宁安市",
            "parent_id": "231000",
            "level": "3",
            "full_name": "黑龙江省-牡丹江市-宁安市"
        },
        {
            "id": "231085",
            "name": "穆棱市",
            "parent_id": "231000",
            "level": "3",
            "full_name": "黑龙江省-牡丹江市-穆棱市"
        },
        {
            "id": "231100",
            "name": "黑河市",
            "parent_id": "230000",
            "level": "2",
            "full_name": "黑龙江省-黑河市"
        },
        {
            "id": "231101",
            "name": "市辖区",
            "parent_id": "231100",
            "level": "3",
            "full_name": "黑龙江省-黑河市-市辖区"
        },
        {
            "id": "231102",
            "name": "爱辉区",
            "parent_id": "231100",
            "level": "3",
            "full_name": "黑龙江省-黑河市-爱辉区"
        },
        {
            "id": "231121",
            "name": "嫩江县",
            "parent_id": "231100",
            "level": "3",
            "full_name": "黑龙江省-黑河市-嫩江县"
        },
        {
            "id": "231123",
            "name": "逊克县",
            "parent_id": "231100",
            "level": "3",
            "full_name": "黑龙江省-黑河市-逊克县"
        },
        {
            "id": "231124",
            "name": "孙吴县",
            "parent_id": "231100",
            "level": "3",
            "full_name": "黑龙江省-黑河市-孙吴县"
        },
        {
            "id": "231181",
            "name": "北安市",
            "parent_id": "231100",
            "level": "3",
            "full_name": "黑龙江省-黑河市-北安市"
        },
        {
            "id": "231182",
            "name": "五大连池市",
            "parent_id": "231100",
            "level": "3",
            "full_name": "黑龙江省-黑河市-五大连池市"
        },
        {
            "id": "231200",
            "name": "绥化市",
            "parent_id": "230000",
            "level": "2",
            "full_name": "黑龙江省-绥化市"
        },
        {
            "id": "231201",
            "name": "市辖区",
            "parent_id": "231200",
            "level": "3",
            "full_name": "黑龙江省-绥化市-市辖区"
        },
        {
            "id": "231202",
            "name": "北林区",
            "parent_id": "231200",
            "level": "3",
            "full_name": "黑龙江省-绥化市-北林区"
        },
        {
            "id": "231221",
            "name": "望奎县",
            "parent_id": "231200",
            "level": "3",
            "full_name": "黑龙江省-绥化市-望奎县"
        },
        {
            "id": "231222",
            "name": "兰西县",
            "parent_id": "231200",
            "level": "3",
            "full_name": "黑龙江省-绥化市-兰西县"
        },
        {
            "id": "231223",
            "name": "青冈县",
            "parent_id": "231200",
            "level": "3",
            "full_name": "黑龙江省-绥化市-青冈县"
        },
        {
            "id": "231224",
            "name": "庆安县",
            "parent_id": "231200",
            "level": "3",
            "full_name": "黑龙江省-绥化市-庆安县"
        },
        {
            "id": "231225",
            "name": "明水县",
            "parent_id": "231200",
            "level": "3",
            "full_name": "黑龙江省-绥化市-明水县"
        },
        {
            "id": "231226",
            "name": "绥棱县",
            "parent_id": "231200",
            "level": "3",
            "full_name": "黑龙江省-绥化市-绥棱县"
        },
        {
            "id": "231281",
            "name": "安达市",
            "parent_id": "231200",
            "level": "3",
            "full_name": "黑龙江省-绥化市-安达市"
        },
        {
            "id": "231282",
            "name": "肇东市",
            "parent_id": "231200",
            "level": "3",
            "full_name": "黑龙江省-绥化市-肇东市"
        },
        {
            "id": "231283",
            "name": "海伦市",
            "parent_id": "231200",
            "level": "3",
            "full_name": "黑龙江省-绥化市-海伦市"
        },
        {
            "id": "232700",
            "name": "大兴安岭地区",
            "parent_id": "230000",
            "level": "2",
            "full_name": "黑龙江省-大兴安岭地区"
        },
        {
            "id": "232721",
            "name": "呼玛县",
            "parent_id": "232700",
            "level": "3",
            "full_name": "黑龙江省-大兴安岭地区-呼玛县"
        },
        {
            "id": "232722",
            "name": "塔河县",
            "parent_id": "232700",
            "level": "3",
            "full_name": "黑龙江省-大兴安岭地区-塔河县"
        },
        {
            "id": "232723",
            "name": "漠河县",
            "parent_id": "232700",
            "level": "3",
            "full_name": "黑龙江省-大兴安岭地区-漠河县"
        },
        {
            "id": "310000",
            "name": "上海市",
            "parent_id": "0",
            "level": "1",
            "full_name": "上海市"
        },
        {
            "id": "310100",
            "name": "市辖区",
            "parent_id": "310000",
            "level": "2",
            "full_name": "上海市-市辖区"
        },
        {
            "id": "310101",
            "name": "黄浦区",
            "parent_id": "310100",
            "level": "3",
            "full_name": "上海市-市辖区-黄浦区"
        },
        {
            "id": "310104",
            "name": "徐汇区",
            "parent_id": "310100",
            "level": "3",
            "full_name": "上海市-市辖区-徐汇区"
        },
        {
            "id": "310105",
            "name": "长宁区",
            "parent_id": "310100",
            "level": "3",
            "full_name": "上海市-市辖区-长宁区"
        },
        {
            "id": "310106",
            "name": "静安区",
            "parent_id": "310100",
            "level": "3",
            "full_name": "上海市-市辖区-静安区"
        },
        {
            "id": "310107",
            "name": "普陀区",
            "parent_id": "310100",
            "level": "3",
            "full_name": "上海市-市辖区-普陀区"
        },
        {
            "id": "310108",
            "name": "闸北区",
            "parent_id": "310100",
            "level": "3",
            "full_name": "上海市-市辖区-闸北区"
        },
        {
            "id": "310109",
            "name": "虹口区",
            "parent_id": "310100",
            "level": "3",
            "full_name": "上海市-市辖区-虹口区"
        },
        {
            "id": "310110",
            "name": "杨浦区",
            "parent_id": "310100",
            "level": "3",
            "full_name": "上海市-市辖区-杨浦区"
        },
        {
            "id": "310112",
            "name": "闵行区",
            "parent_id": "310100",
            "level": "3",
            "full_name": "上海市-市辖区-闵行区"
        },
        {
            "id": "310113",
            "name": "宝山区",
            "parent_id": "310100",
            "level": "3",
            "full_name": "上海市-市辖区-宝山区"
        },
        {
            "id": "310114",
            "name": "嘉定区",
            "parent_id": "310100",
            "level": "3",
            "full_name": "上海市-市辖区-嘉定区"
        },
        {
            "id": "310115",
            "name": "浦东新区",
            "parent_id": "310100",
            "level": "3",
            "full_name": "上海市-市辖区-浦东新区"
        },
        {
            "id": "310116",
            "name": "金山区",
            "parent_id": "310100",
            "level": "3",
            "full_name": "上海市-市辖区-金山区"
        },
        {
            "id": "310117",
            "name": "松江区",
            "parent_id": "310100",
            "level": "3",
            "full_name": "上海市-市辖区-松江区"
        },
        {
            "id": "310118",
            "name": "青浦区",
            "parent_id": "310100",
            "level": "3",
            "full_name": "上海市-市辖区-青浦区"
        },
        {
            "id": "310120",
            "name": "奉贤区",
            "parent_id": "310100",
            "level": "3",
            "full_name": "上海市-市辖区-奉贤区"
        },
        {
            "id": "310200",
            "name": "县",
            "parent_id": "310000",
            "level": "2",
            "full_name": "上海市-县"
        },
        {
            "id": "310230",
            "name": "崇明县",
            "parent_id": "310200",
            "level": "3",
            "full_name": "上海市-县-崇明县"
        },
        {
            "id": "320000",
            "name": "江苏省",
            "parent_id": "0",
            "level": "1",
            "full_name": "江苏省"
        },
        {
            "id": "320100",
            "name": "南京市",
            "parent_id": "320000",
            "level": "2",
            "full_name": "江苏省-南京市"
        },
        {
            "id": "320101",
            "name": "市辖区",
            "parent_id": "320100",
            "level": "3",
            "full_name": "江苏省-南京市-市辖区"
        },
        {
            "id": "320102",
            "name": "玄武区",
            "parent_id": "320100",
            "level": "3",
            "full_name": "江苏省-南京市-玄武区"
        },
        {
            "id": "320104",
            "name": "秦淮区",
            "parent_id": "320100",
            "level": "3",
            "full_name": "江苏省-南京市-秦淮区"
        },
        {
            "id": "320105",
            "name": "建邺区",
            "parent_id": "320100",
            "level": "3",
            "full_name": "江苏省-南京市-建邺区"
        },
        {
            "id": "320106",
            "name": "鼓楼区",
            "parent_id": "320100",
            "level": "3",
            "full_name": "江苏省-南京市-鼓楼区"
        },
        {
            "id": "320111",
            "name": "浦口区",
            "parent_id": "320100",
            "level": "3",
            "full_name": "江苏省-南京市-浦口区"
        },
        {
            "id": "320113",
            "name": "栖霞区",
            "parent_id": "320100",
            "level": "3",
            "full_name": "江苏省-南京市-栖霞区"
        },
        {
            "id": "320114",
            "name": "雨花台区",
            "parent_id": "320100",
            "level": "3",
            "full_name": "江苏省-南京市-雨花台区"
        },
        {
            "id": "320115",
            "name": "江宁区",
            "parent_id": "320100",
            "level": "3",
            "full_name": "江苏省-南京市-江宁区"
        },
        {
            "id": "320116",
            "name": "六合区",
            "parent_id": "320100",
            "level": "3",
            "full_name": "江苏省-南京市-六合区"
        },
        {
            "id": "320117",
            "name": "溧水区",
            "parent_id": "320100",
            "level": "3",
            "full_name": "江苏省-南京市-溧水区"
        },
        {
            "id": "320118",
            "name": "高淳区",
            "parent_id": "320100",
            "level": "3",
            "full_name": "江苏省-南京市-高淳区"
        },
        {
            "id": "320200",
            "name": "无锡市",
            "parent_id": "320000",
            "level": "2",
            "full_name": "江苏省-无锡市"
        },
        {
            "id": "320201",
            "name": "市辖区",
            "parent_id": "320200",
            "level": "3",
            "full_name": "江苏省-无锡市-市辖区"
        },
        {
            "id": "320202",
            "name": "崇安区",
            "parent_id": "320200",
            "level": "3",
            "full_name": "江苏省-无锡市-崇安区"
        },
        {
            "id": "320203",
            "name": "南长区",
            "parent_id": "320200",
            "level": "3",
            "full_name": "江苏省-无锡市-南长区"
        },
        {
            "id": "320204",
            "name": "北塘区",
            "parent_id": "320200",
            "level": "3",
            "full_name": "江苏省-无锡市-北塘区"
        },
        {
            "id": "320205",
            "name": "锡山区",
            "parent_id": "320200",
            "level": "3",
            "full_name": "江苏省-无锡市-锡山区"
        },
        {
            "id": "320206",
            "name": "惠山区",
            "parent_id": "320200",
            "level": "3",
            "full_name": "江苏省-无锡市-惠山区"
        },
        {
            "id": "320211",
            "name": "滨湖区",
            "parent_id": "320200",
            "level": "3",
            "full_name": "江苏省-无锡市-滨湖区"
        },
        {
            "id": "320281",
            "name": "江阴市",
            "parent_id": "320200",
            "level": "3",
            "full_name": "江苏省-无锡市-江阴市"
        },
        {
            "id": "320282",
            "name": "宜兴市",
            "parent_id": "320200",
            "level": "3",
            "full_name": "江苏省-无锡市-宜兴市"
        },
        {
            "id": "320300",
            "name": "徐州市",
            "parent_id": "320000",
            "level": "2",
            "full_name": "江苏省-徐州市"
        },
        {
            "id": "320301",
            "name": "市辖区",
            "parent_id": "320300",
            "level": "3",
            "full_name": "江苏省-徐州市-市辖区"
        },
        {
            "id": "320302",
            "name": "鼓楼区",
            "parent_id": "320300",
            "level": "3",
            "full_name": "江苏省-徐州市-鼓楼区"
        },
        {
            "id": "320303",
            "name": "云龙区",
            "parent_id": "320300",
            "level": "3",
            "full_name": "江苏省-徐州市-云龙区"
        },
        {
            "id": "320305",
            "name": "贾汪区",
            "parent_id": "320300",
            "level": "3",
            "full_name": "江苏省-徐州市-贾汪区"
        },
        {
            "id": "320311",
            "name": "泉山区",
            "parent_id": "320300",
            "level": "3",
            "full_name": "江苏省-徐州市-泉山区"
        },
        {
            "id": "320312",
            "name": "铜山区",
            "parent_id": "320300",
            "level": "3",
            "full_name": "江苏省-徐州市-铜山区"
        },
        {
            "id": "320321",
            "name": "丰县",
            "parent_id": "320300",
            "level": "3",
            "full_name": "江苏省-徐州市-丰县"
        },
        {
            "id": "320322",
            "name": "沛县",
            "parent_id": "320300",
            "level": "3",
            "full_name": "江苏省-徐州市-沛县"
        },
        {
            "id": "320324",
            "name": "睢宁县",
            "parent_id": "320300",
            "level": "3",
            "full_name": "江苏省-徐州市-睢宁县"
        },
        {
            "id": "320381",
            "name": "新沂市",
            "parent_id": "320300",
            "level": "3",
            "full_name": "江苏省-徐州市-新沂市"
        },
        {
            "id": "320382",
            "name": "邳州市",
            "parent_id": "320300",
            "level": "3",
            "full_name": "江苏省-徐州市-邳州市"
        },
        {
            "id": "320400",
            "name": "常州市",
            "parent_id": "320000",
            "level": "2",
            "full_name": "江苏省-常州市"
        },
        {
            "id": "320401",
            "name": "市辖区",
            "parent_id": "320400",
            "level": "3",
            "full_name": "江苏省-常州市-市辖区"
        },
        {
            "id": "320402",
            "name": "天宁区",
            "parent_id": "320400",
            "level": "3",
            "full_name": "江苏省-常州市-天宁区"
        },
        {
            "id": "320404",
            "name": "钟楼区",
            "parent_id": "320400",
            "level": "3",
            "full_name": "江苏省-常州市-钟楼区"
        },
        {
            "id": "320411",
            "name": "新北区",
            "parent_id": "320400",
            "level": "3",
            "full_name": "江苏省-常州市-新北区"
        },
        {
            "id": "320412",
            "name": "武进区",
            "parent_id": "320400",
            "level": "3",
            "full_name": "江苏省-常州市-武进区"
        },
        {
            "id": "320413",
            "name": "金坛区",
            "parent_id": "320400",
            "level": "3",
            "full_name": "江苏省-常州市-金坛区"
        },
        {
            "id": "320481",
            "name": "溧阳市",
            "parent_id": "320400",
            "level": "3",
            "full_name": "江苏省-常州市-溧阳市"
        },
        {
            "id": "320500",
            "name": "苏州市",
            "parent_id": "320000",
            "level": "2",
            "full_name": "江苏省-苏州市"
        },
        {
            "id": "320501",
            "name": "市辖区",
            "parent_id": "320500",
            "level": "3",
            "full_name": "江苏省-苏州市-市辖区"
        },
        {
            "id": "320505",
            "name": "虎丘区",
            "parent_id": "320500",
            "level": "3",
            "full_name": "江苏省-苏州市-虎丘区"
        },
        {
            "id": "320506",
            "name": "吴中区",
            "parent_id": "320500",
            "level": "3",
            "full_name": "江苏省-苏州市-吴中区"
        },
        {
            "id": "320507",
            "name": "相城区",
            "parent_id": "320500",
            "level": "3",
            "full_name": "江苏省-苏州市-相城区"
        },
        {
            "id": "320508",
            "name": "姑苏区",
            "parent_id": "320500",
            "level": "3",
            "full_name": "江苏省-苏州市-姑苏区"
        },
        {
            "id": "320509",
            "name": "吴江区",
            "parent_id": "320500",
            "level": "3",
            "full_name": "江苏省-苏州市-吴江区"
        },
        {
            "id": "320581",
            "name": "常熟市",
            "parent_id": "320500",
            "level": "3",
            "full_name": "江苏省-苏州市-常熟市"
        },
        {
            "id": "320582",
            "name": "张家港市",
            "parent_id": "320500",
            "level": "3",
            "full_name": "江苏省-苏州市-张家港市"
        },
        {
            "id": "320583",
            "name": "昆山市",
            "parent_id": "320500",
            "level": "3",
            "full_name": "江苏省-苏州市-昆山市"
        },
        {
            "id": "320585",
            "name": "太仓市",
            "parent_id": "320500",
            "level": "3",
            "full_name": "江苏省-苏州市-太仓市"
        },
        {
            "id": "320600",
            "name": "南通市",
            "parent_id": "320000",
            "level": "2",
            "full_name": "江苏省-南通市"
        },
        {
            "id": "320601",
            "name": "市辖区",
            "parent_id": "320600",
            "level": "3",
            "full_name": "江苏省-南通市-市辖区"
        },
        {
            "id": "320602",
            "name": "崇川区",
            "parent_id": "320600",
            "level": "3",
            "full_name": "江苏省-南通市-崇川区"
        },
        {
            "id": "320611",
            "name": "港闸区",
            "parent_id": "320600",
            "level": "3",
            "full_name": "江苏省-南通市-港闸区"
        },
        {
            "id": "320612",
            "name": "通州区",
            "parent_id": "320600",
            "level": "3",
            "full_name": "江苏省-南通市-通州区"
        },
        {
            "id": "320621",
            "name": "海安县",
            "parent_id": "320600",
            "level": "3",
            "full_name": "江苏省-南通市-海安县"
        },
        {
            "id": "320623",
            "name": "如东县",
            "parent_id": "320600",
            "level": "3",
            "full_name": "江苏省-南通市-如东县"
        },
        {
            "id": "320681",
            "name": "启东市",
            "parent_id": "320600",
            "level": "3",
            "full_name": "江苏省-南通市-启东市"
        },
        {
            "id": "320682",
            "name": "如皋市",
            "parent_id": "320600",
            "level": "3",
            "full_name": "江苏省-南通市-如皋市"
        },
        {
            "id": "320684",
            "name": "海门市",
            "parent_id": "320600",
            "level": "3",
            "full_name": "江苏省-南通市-海门市"
        },
        {
            "id": "320700",
            "name": "连云港市",
            "parent_id": "320000",
            "level": "2",
            "full_name": "江苏省-连云港市"
        },
        {
            "id": "320701",
            "name": "市辖区",
            "parent_id": "320700",
            "level": "3",
            "full_name": "江苏省-连云港市-市辖区"
        },
        {
            "id": "320703",
            "name": "连云区",
            "parent_id": "320700",
            "level": "3",
            "full_name": "江苏省-连云港市-连云区"
        },
        {
            "id": "320706",
            "name": "海州区",
            "parent_id": "320700",
            "level": "3",
            "full_name": "江苏省-连云港市-海州区"
        },
        {
            "id": "320707",
            "name": "赣榆区",
            "parent_id": "320700",
            "level": "3",
            "full_name": "江苏省-连云港市-赣榆区"
        },
        {
            "id": "320722",
            "name": "东海县",
            "parent_id": "320700",
            "level": "3",
            "full_name": "江苏省-连云港市-东海县"
        },
        {
            "id": "320723",
            "name": "灌云县",
            "parent_id": "320700",
            "level": "3",
            "full_name": "江苏省-连云港市-灌云县"
        },
        {
            "id": "320724",
            "name": "灌南县",
            "parent_id": "320700",
            "level": "3",
            "full_name": "江苏省-连云港市-灌南县"
        },
        {
            "id": "320800",
            "name": "淮安市",
            "parent_id": "320000",
            "level": "2",
            "full_name": "江苏省-淮安市"
        },
        {
            "id": "320801",
            "name": "市辖区",
            "parent_id": "320800",
            "level": "3",
            "full_name": "江苏省-淮安市-市辖区"
        },
        {
            "id": "320802",
            "name": "清河区",
            "parent_id": "320800",
            "level": "3",
            "full_name": "江苏省-淮安市-清河区"
        },
        {
            "id": "320803",
            "name": "淮安区",
            "parent_id": "320800",
            "level": "3",
            "full_name": "江苏省-淮安市-淮安区"
        },
        {
            "id": "320804",
            "name": "淮阴区",
            "parent_id": "320800",
            "level": "3",
            "full_name": "江苏省-淮安市-淮阴区"
        },
        {
            "id": "320811",
            "name": "清浦区",
            "parent_id": "320800",
            "level": "3",
            "full_name": "江苏省-淮安市-清浦区"
        },
        {
            "id": "320826",
            "name": "涟水县",
            "parent_id": "320800",
            "level": "3",
            "full_name": "江苏省-淮安市-涟水县"
        },
        {
            "id": "320829",
            "name": "洪泽县",
            "parent_id": "320800",
            "level": "3",
            "full_name": "江苏省-淮安市-洪泽县"
        },
        {
            "id": "320830",
            "name": "盱眙县",
            "parent_id": "320800",
            "level": "3",
            "full_name": "江苏省-淮安市-盱眙县"
        },
        {
            "id": "320831",
            "name": "金湖县",
            "parent_id": "320800",
            "level": "3",
            "full_name": "江苏省-淮安市-金湖县"
        },
        {
            "id": "320900",
            "name": "盐城市",
            "parent_id": "320000",
            "level": "2",
            "full_name": "江苏省-盐城市"
        },
        {
            "id": "320901",
            "name": "市辖区",
            "parent_id": "320900",
            "level": "3",
            "full_name": "江苏省-盐城市-市辖区"
        },
        {
            "id": "320902",
            "name": "亭湖区",
            "parent_id": "320900",
            "level": "3",
            "full_name": "江苏省-盐城市-亭湖区"
        },
        {
            "id": "320903",
            "name": "盐都区",
            "parent_id": "320900",
            "level": "3",
            "full_name": "江苏省-盐城市-盐都区"
        },
        {
            "id": "320904",
            "name": "大丰区",
            "parent_id": "320900",
            "level": "3",
            "full_name": "江苏省-盐城市-大丰区"
        },
        {
            "id": "320921",
            "name": "响水县",
            "parent_id": "320900",
            "level": "3",
            "full_name": "江苏省-盐城市-响水县"
        },
        {
            "id": "320922",
            "name": "滨海县",
            "parent_id": "320900",
            "level": "3",
            "full_name": "江苏省-盐城市-滨海县"
        },
        {
            "id": "320923",
            "name": "阜宁县",
            "parent_id": "320900",
            "level": "3",
            "full_name": "江苏省-盐城市-阜宁县"
        },
        {
            "id": "320924",
            "name": "射阳县",
            "parent_id": "320900",
            "level": "3",
            "full_name": "江苏省-盐城市-射阳县"
        },
        {
            "id": "320925",
            "name": "建湖县",
            "parent_id": "320900",
            "level": "3",
            "full_name": "江苏省-盐城市-建湖县"
        },
        {
            "id": "320981",
            "name": "东台市",
            "parent_id": "320900",
            "level": "3",
            "full_name": "江苏省-盐城市-东台市"
        },
        {
            "id": "321000",
            "name": "扬州市",
            "parent_id": "320000",
            "level": "2",
            "full_name": "江苏省-扬州市"
        },
        {
            "id": "321001",
            "name": "市辖区",
            "parent_id": "321000",
            "level": "3",
            "full_name": "江苏省-扬州市-市辖区"
        },
        {
            "id": "321002",
            "name": "广陵区",
            "parent_id": "321000",
            "level": "3",
            "full_name": "江苏省-扬州市-广陵区"
        },
        {
            "id": "321003",
            "name": "邗江区",
            "parent_id": "321000",
            "level": "3",
            "full_name": "江苏省-扬州市-邗江区"
        },
        {
            "id": "321012",
            "name": "江都区",
            "parent_id": "321000",
            "level": "3",
            "full_name": "江苏省-扬州市-江都区"
        },
        {
            "id": "321023",
            "name": "宝应县",
            "parent_id": "321000",
            "level": "3",
            "full_name": "江苏省-扬州市-宝应县"
        },
        {
            "id": "321081",
            "name": "仪征市",
            "parent_id": "321000",
            "level": "3",
            "full_name": "江苏省-扬州市-仪征市"
        },
        {
            "id": "321084",
            "name": "高邮市",
            "parent_id": "321000",
            "level": "3",
            "full_name": "江苏省-扬州市-高邮市"
        },
        {
            "id": "321100",
            "name": "镇江市",
            "parent_id": "320000",
            "level": "2",
            "full_name": "江苏省-镇江市"
        },
        {
            "id": "321101",
            "name": "市辖区",
            "parent_id": "321100",
            "level": "3",
            "full_name": "江苏省-镇江市-市辖区"
        },
        {
            "id": "321102",
            "name": "京口区",
            "parent_id": "321100",
            "level": "3",
            "full_name": "江苏省-镇江市-京口区"
        },
        {
            "id": "321111",
            "name": "润州区",
            "parent_id": "321100",
            "level": "3",
            "full_name": "江苏省-镇江市-润州区"
        },
        {
            "id": "321112",
            "name": "丹徒区",
            "parent_id": "321100",
            "level": "3",
            "full_name": "江苏省-镇江市-丹徒区"
        },
        {
            "id": "321181",
            "name": "丹阳市",
            "parent_id": "321100",
            "level": "3",
            "full_name": "江苏省-镇江市-丹阳市"
        },
        {
            "id": "321182",
            "name": "扬中市",
            "parent_id": "321100",
            "level": "3",
            "full_name": "江苏省-镇江市-扬中市"
        },
        {
            "id": "321183",
            "name": "句容市",
            "parent_id": "321100",
            "level": "3",
            "full_name": "江苏省-镇江市-句容市"
        },
        {
            "id": "321200",
            "name": "泰州市",
            "parent_id": "320000",
            "level": "2",
            "full_name": "江苏省-泰州市"
        },
        {
            "id": "321201",
            "name": "市辖区",
            "parent_id": "321200",
            "level": "3",
            "full_name": "江苏省-泰州市-市辖区"
        },
        {
            "id": "321202",
            "name": "海陵区",
            "parent_id": "321200",
            "level": "3",
            "full_name": "江苏省-泰州市-海陵区"
        },
        {
            "id": "321203",
            "name": "高港区",
            "parent_id": "321200",
            "level": "3",
            "full_name": "江苏省-泰州市-高港区"
        },
        {
            "id": "321204",
            "name": "姜堰区",
            "parent_id": "321200",
            "level": "3",
            "full_name": "江苏省-泰州市-姜堰区"
        },
        {
            "id": "321281",
            "name": "兴化市",
            "parent_id": "321200",
            "level": "3",
            "full_name": "江苏省-泰州市-兴化市"
        },
        {
            "id": "321282",
            "name": "靖江市",
            "parent_id": "321200",
            "level": "3",
            "full_name": "江苏省-泰州市-靖江市"
        },
        {
            "id": "321283",
            "name": "泰兴市",
            "parent_id": "321200",
            "level": "3",
            "full_name": "江苏省-泰州市-泰兴市"
        },
        {
            "id": "321300",
            "name": "宿迁市",
            "parent_id": "320000",
            "level": "2",
            "full_name": "江苏省-宿迁市"
        },
        {
            "id": "321301",
            "name": "市辖区",
            "parent_id": "321300",
            "level": "3",
            "full_name": "江苏省-宿迁市-市辖区"
        },
        {
            "id": "321302",
            "name": "宿城区",
            "parent_id": "321300",
            "level": "3",
            "full_name": "江苏省-宿迁市-宿城区"
        },
        {
            "id": "321311",
            "name": "宿豫区",
            "parent_id": "321300",
            "level": "3",
            "full_name": "江苏省-宿迁市-宿豫区"
        },
        {
            "id": "321322",
            "name": "沭阳县",
            "parent_id": "321300",
            "level": "3",
            "full_name": "江苏省-宿迁市-沭阳县"
        },
        {
            "id": "321323",
            "name": "泗阳县",
            "parent_id": "321300",
            "level": "3",
            "full_name": "江苏省-宿迁市-泗阳县"
        },
        {
            "id": "321324",
            "name": "泗洪县",
            "parent_id": "321300",
            "level": "3",
            "full_name": "江苏省-宿迁市-泗洪县"
        },
        {
            "id": "330000",
            "name": "浙江省",
            "parent_id": "0",
            "level": "1",
            "full_name": "浙江省"
        },
        {
            "id": "330100",
            "name": "杭州市",
            "parent_id": "330000",
            "level": "2",
            "full_name": "浙江省-杭州市"
        },
        {
            "id": "330101",
            "name": "市辖区",
            "parent_id": "330100",
            "level": "3",
            "full_name": "浙江省-杭州市-市辖区"
        },
        {
            "id": "330102",
            "name": "上城区",
            "parent_id": "330100",
            "level": "3",
            "full_name": "浙江省-杭州市-上城区"
        },
        {
            "id": "330103",
            "name": "下城区",
            "parent_id": "330100",
            "level": "3",
            "full_name": "浙江省-杭州市-下城区"
        },
        {
            "id": "330104",
            "name": "江干区",
            "parent_id": "330100",
            "level": "3",
            "full_name": "浙江省-杭州市-江干区"
        },
        {
            "id": "330105",
            "name": "拱墅区",
            "parent_id": "330100",
            "level": "3",
            "full_name": "浙江省-杭州市-拱墅区"
        },
        {
            "id": "330106",
            "name": "西湖区",
            "parent_id": "330100",
            "level": "3",
            "full_name": "浙江省-杭州市-西湖区"
        },
        {
            "id": "330108",
            "name": "滨江区",
            "parent_id": "330100",
            "level": "3",
            "full_name": "浙江省-杭州市-滨江区"
        },
        {
            "id": "330109",
            "name": "萧山区",
            "parent_id": "330100",
            "level": "3",
            "full_name": "浙江省-杭州市-萧山区"
        },
        {
            "id": "330110",
            "name": "余杭区",
            "parent_id": "330100",
            "level": "3",
            "full_name": "浙江省-杭州市-余杭区"
        },
        {
            "id": "330111",
            "name": "富阳区",
            "parent_id": "330100",
            "level": "3",
            "full_name": "浙江省-杭州市-富阳区"
        },
        {
            "id": "330122",
            "name": "桐庐县",
            "parent_id": "330100",
            "level": "3",
            "full_name": "浙江省-杭州市-桐庐县"
        },
        {
            "id": "330127",
            "name": "淳安县",
            "parent_id": "330100",
            "level": "3",
            "full_name": "浙江省-杭州市-淳安县"
        },
        {
            "id": "330182",
            "name": "建德市",
            "parent_id": "330100",
            "level": "3",
            "full_name": "浙江省-杭州市-建德市"
        },
        {
            "id": "330185",
            "name": "临安市",
            "parent_id": "330100",
            "level": "3",
            "full_name": "浙江省-杭州市-临安市"
        },
        {
            "id": "330200",
            "name": "宁波市",
            "parent_id": "330000",
            "level": "2",
            "full_name": "浙江省-宁波市"
        },
        {
            "id": "330201",
            "name": "市辖区",
            "parent_id": "330200",
            "level": "3",
            "full_name": "浙江省-宁波市-市辖区"
        },
        {
            "id": "330203",
            "name": "海曙区",
            "parent_id": "330200",
            "level": "3",
            "full_name": "浙江省-宁波市-海曙区"
        },
        {
            "id": "330204",
            "name": "江东区",
            "parent_id": "330200",
            "level": "3",
            "full_name": "浙江省-宁波市-江东区"
        },
        {
            "id": "330205",
            "name": "江北区",
            "parent_id": "330200",
            "level": "3",
            "full_name": "浙江省-宁波市-江北区"
        },
        {
            "id": "330206",
            "name": "北仑区",
            "parent_id": "330200",
            "level": "3",
            "full_name": "浙江省-宁波市-北仑区"
        },
        {
            "id": "330211",
            "name": "镇海区",
            "parent_id": "330200",
            "level": "3",
            "full_name": "浙江省-宁波市-镇海区"
        },
        {
            "id": "330212",
            "name": "鄞州区",
            "parent_id": "330200",
            "level": "3",
            "full_name": "浙江省-宁波市-鄞州区"
        },
        {
            "id": "330225",
            "name": "象山县",
            "parent_id": "330200",
            "level": "3",
            "full_name": "浙江省-宁波市-象山县"
        },
        {
            "id": "330226",
            "name": "宁海县",
            "parent_id": "330200",
            "level": "3",
            "full_name": "浙江省-宁波市-宁海县"
        },
        {
            "id": "330281",
            "name": "余姚市",
            "parent_id": "330200",
            "level": "3",
            "full_name": "浙江省-宁波市-余姚市"
        },
        {
            "id": "330282",
            "name": "慈溪市",
            "parent_id": "330200",
            "level": "3",
            "full_name": "浙江省-宁波市-慈溪市"
        },
        {
            "id": "330283",
            "name": "奉化市",
            "parent_id": "330200",
            "level": "3",
            "full_name": "浙江省-宁波市-奉化市"
        },
        {
            "id": "330300",
            "name": "温州市",
            "parent_id": "330000",
            "level": "2",
            "full_name": "浙江省-温州市"
        },
        {
            "id": "330301",
            "name": "市辖区",
            "parent_id": "330300",
            "level": "3",
            "full_name": "浙江省-温州市-市辖区"
        },
        {
            "id": "330302",
            "name": "鹿城区",
            "parent_id": "330300",
            "level": "3",
            "full_name": "浙江省-温州市-鹿城区"
        },
        {
            "id": "330303",
            "name": "龙湾区",
            "parent_id": "330300",
            "level": "3",
            "full_name": "浙江省-温州市-龙湾区"
        },
        {
            "id": "330304",
            "name": "瓯海区",
            "parent_id": "330300",
            "level": "3",
            "full_name": "浙江省-温州市-瓯海区"
        },
        {
            "id": "330305",
            "name": "洞头区",
            "parent_id": "330300",
            "level": "3",
            "full_name": "浙江省-温州市-洞头区"
        },
        {
            "id": "330324",
            "name": "永嘉县",
            "parent_id": "330300",
            "level": "3",
            "full_name": "浙江省-温州市-永嘉县"
        },
        {
            "id": "330326",
            "name": "平阳县",
            "parent_id": "330300",
            "level": "3",
            "full_name": "浙江省-温州市-平阳县"
        },
        {
            "id": "330327",
            "name": "苍南县",
            "parent_id": "330300",
            "level": "3",
            "full_name": "浙江省-温州市-苍南县"
        },
        {
            "id": "330328",
            "name": "文成县",
            "parent_id": "330300",
            "level": "3",
            "full_name": "浙江省-温州市-文成县"
        },
        {
            "id": "330329",
            "name": "泰顺县",
            "parent_id": "330300",
            "level": "3",
            "full_name": "浙江省-温州市-泰顺县"
        },
        {
            "id": "330381",
            "name": "瑞安市",
            "parent_id": "330300",
            "level": "3",
            "full_name": "浙江省-温州市-瑞安市"
        },
        {
            "id": "330382",
            "name": "乐清市",
            "parent_id": "330300",
            "level": "3",
            "full_name": "浙江省-温州市-乐清市"
        },
        {
            "id": "330400",
            "name": "嘉兴市",
            "parent_id": "330000",
            "level": "2",
            "full_name": "浙江省-嘉兴市"
        },
        {
            "id": "330401",
            "name": "市辖区",
            "parent_id": "330400",
            "level": "3",
            "full_name": "浙江省-嘉兴市-市辖区"
        },
        {
            "id": "330402",
            "name": "南湖区",
            "parent_id": "330400",
            "level": "3",
            "full_name": "浙江省-嘉兴市-南湖区"
        },
        {
            "id": "330411",
            "name": "秀洲区",
            "parent_id": "330400",
            "level": "3",
            "full_name": "浙江省-嘉兴市-秀洲区"
        },
        {
            "id": "330421",
            "name": "嘉善县",
            "parent_id": "330400",
            "level": "3",
            "full_name": "浙江省-嘉兴市-嘉善县"
        },
        {
            "id": "330424",
            "name": "海盐县",
            "parent_id": "330400",
            "level": "3",
            "full_name": "浙江省-嘉兴市-海盐县"
        },
        {
            "id": "330481",
            "name": "海宁市",
            "parent_id": "330400",
            "level": "3",
            "full_name": "浙江省-嘉兴市-海宁市"
        },
        {
            "id": "330482",
            "name": "平湖市",
            "parent_id": "330400",
            "level": "3",
            "full_name": "浙江省-嘉兴市-平湖市"
        },
        {
            "id": "330483",
            "name": "桐乡市",
            "parent_id": "330400",
            "level": "3",
            "full_name": "浙江省-嘉兴市-桐乡市"
        },
        {
            "id": "330500",
            "name": "湖州市",
            "parent_id": "330000",
            "level": "2",
            "full_name": "浙江省-湖州市"
        },
        {
            "id": "330501",
            "name": "市辖区",
            "parent_id": "330500",
            "level": "3",
            "full_name": "浙江省-湖州市-市辖区"
        },
        {
            "id": "330502",
            "name": "吴兴区",
            "parent_id": "330500",
            "level": "3",
            "full_name": "浙江省-湖州市-吴兴区"
        },
        {
            "id": "330503",
            "name": "南浔区",
            "parent_id": "330500",
            "level": "3",
            "full_name": "浙江省-湖州市-南浔区"
        },
        {
            "id": "330521",
            "name": "德清县",
            "parent_id": "330500",
            "level": "3",
            "full_name": "浙江省-湖州市-德清县"
        },
        {
            "id": "330522",
            "name": "长兴县",
            "parent_id": "330500",
            "level": "3",
            "full_name": "浙江省-湖州市-长兴县"
        },
        {
            "id": "330523",
            "name": "安吉县",
            "parent_id": "330500",
            "level": "3",
            "full_name": "浙江省-湖州市-安吉县"
        },
        {
            "id": "330600",
            "name": "绍兴市",
            "parent_id": "330000",
            "level": "2",
            "full_name": "浙江省-绍兴市"
        },
        {
            "id": "330601",
            "name": "市辖区",
            "parent_id": "330600",
            "level": "3",
            "full_name": "浙江省-绍兴市-市辖区"
        },
        {
            "id": "330602",
            "name": "越城区",
            "parent_id": "330600",
            "level": "3",
            "full_name": "浙江省-绍兴市-越城区"
        },
        {
            "id": "330603",
            "name": "柯桥区",
            "parent_id": "330600",
            "level": "3",
            "full_name": "浙江省-绍兴市-柯桥区"
        },
        {
            "id": "330604",
            "name": "上虞区",
            "parent_id": "330600",
            "level": "3",
            "full_name": "浙江省-绍兴市-上虞区"
        },
        {
            "id": "330624",
            "name": "新昌县",
            "parent_id": "330600",
            "level": "3",
            "full_name": "浙江省-绍兴市-新昌县"
        },
        {
            "id": "330681",
            "name": "诸暨市",
            "parent_id": "330600",
            "level": "3",
            "full_name": "浙江省-绍兴市-诸暨市"
        },
        {
            "id": "330683",
            "name": "嵊州市",
            "parent_id": "330600",
            "level": "3",
            "full_name": "浙江省-绍兴市-嵊州市"
        },
        {
            "id": "330700",
            "name": "金华市",
            "parent_id": "330000",
            "level": "2",
            "full_name": "浙江省-金华市"
        },
        {
            "id": "330701",
            "name": "市辖区",
            "parent_id": "330700",
            "level": "3",
            "full_name": "浙江省-金华市-市辖区"
        },
        {
            "id": "330702",
            "name": "婺城区",
            "parent_id": "330700",
            "level": "3",
            "full_name": "浙江省-金华市-婺城区"
        },
        {
            "id": "330703",
            "name": "金东区",
            "parent_id": "330700",
            "level": "3",
            "full_name": "浙江省-金华市-金东区"
        },
        {
            "id": "330723",
            "name": "武义县",
            "parent_id": "330700",
            "level": "3",
            "full_name": "浙江省-金华市-武义县"
        },
        {
            "id": "330726",
            "name": "浦江县",
            "parent_id": "330700",
            "level": "3",
            "full_name": "浙江省-金华市-浦江县"
        },
        {
            "id": "330727",
            "name": "磐安县",
            "parent_id": "330700",
            "level": "3",
            "full_name": "浙江省-金华市-磐安县"
        },
        {
            "id": "330781",
            "name": "兰溪市",
            "parent_id": "330700",
            "level": "3",
            "full_name": "浙江省-金华市-兰溪市"
        },
        {
            "id": "330782",
            "name": "义乌市",
            "parent_id": "330700",
            "level": "3",
            "full_name": "浙江省-金华市-义乌市"
        },
        {
            "id": "330783",
            "name": "东阳市",
            "parent_id": "330700",
            "level": "3",
            "full_name": "浙江省-金华市-东阳市"
        },
        {
            "id": "330784",
            "name": "永康市",
            "parent_id": "330700",
            "level": "3",
            "full_name": "浙江省-金华市-永康市"
        },
        {
            "id": "330800",
            "name": "衢州市",
            "parent_id": "330000",
            "level": "2",
            "full_name": "浙江省-衢州市"
        },
        {
            "id": "330801",
            "name": "市辖区",
            "parent_id": "330800",
            "level": "3",
            "full_name": "浙江省-衢州市-市辖区"
        },
        {
            "id": "330802",
            "name": "柯城区",
            "parent_id": "330800",
            "level": "3",
            "full_name": "浙江省-衢州市-柯城区"
        },
        {
            "id": "330803",
            "name": "衢江区",
            "parent_id": "330800",
            "level": "3",
            "full_name": "浙江省-衢州市-衢江区"
        },
        {
            "id": "330822",
            "name": "常山县",
            "parent_id": "330800",
            "level": "3",
            "full_name": "浙江省-衢州市-常山县"
        },
        {
            "id": "330824",
            "name": "开化县",
            "parent_id": "330800",
            "level": "3",
            "full_name": "浙江省-衢州市-开化县"
        },
        {
            "id": "330825",
            "name": "龙游县",
            "parent_id": "330800",
            "level": "3",
            "full_name": "浙江省-衢州市-龙游县"
        },
        {
            "id": "330881",
            "name": "江山市",
            "parent_id": "330800",
            "level": "3",
            "full_name": "浙江省-衢州市-江山市"
        },
        {
            "id": "330900",
            "name": "舟山市",
            "parent_id": "330000",
            "level": "2",
            "full_name": "浙江省-舟山市"
        },
        {
            "id": "330901",
            "name": "市辖区",
            "parent_id": "330900",
            "level": "3",
            "full_name": "浙江省-舟山市-市辖区"
        },
        {
            "id": "330902",
            "name": "定海区",
            "parent_id": "330900",
            "level": "3",
            "full_name": "浙江省-舟山市-定海区"
        },
        {
            "id": "330903",
            "name": "普陀区",
            "parent_id": "330900",
            "level": "3",
            "full_name": "浙江省-舟山市-普陀区"
        },
        {
            "id": "330921",
            "name": "岱山县",
            "parent_id": "330900",
            "level": "3",
            "full_name": "浙江省-舟山市-岱山县"
        },
        {
            "id": "330922",
            "name": "嵊泗县",
            "parent_id": "330900",
            "level": "3",
            "full_name": "浙江省-舟山市-嵊泗县"
        },
        {
            "id": "331000",
            "name": "台州市",
            "parent_id": "330000",
            "level": "2",
            "full_name": "浙江省-台州市"
        },
        {
            "id": "331001",
            "name": "市辖区",
            "parent_id": "331000",
            "level": "3",
            "full_name": "浙江省-台州市-市辖区"
        },
        {
            "id": "331002",
            "name": "椒江区",
            "parent_id": "331000",
            "level": "3",
            "full_name": "浙江省-台州市-椒江区"
        },
        {
            "id": "331003",
            "name": "黄岩区",
            "parent_id": "331000",
            "level": "3",
            "full_name": "浙江省-台州市-黄岩区"
        },
        {
            "id": "331004",
            "name": "路桥区",
            "parent_id": "331000",
            "level": "3",
            "full_name": "浙江省-台州市-路桥区"
        },
        {
            "id": "331021",
            "name": "玉环县",
            "parent_id": "331000",
            "level": "3",
            "full_name": "浙江省-台州市-玉环县"
        },
        {
            "id": "331022",
            "name": "三门县",
            "parent_id": "331000",
            "level": "3",
            "full_name": "浙江省-台州市-三门县"
        },
        {
            "id": "331023",
            "name": "天台县",
            "parent_id": "331000",
            "level": "3",
            "full_name": "浙江省-台州市-天台县"
        },
        {
            "id": "331024",
            "name": "仙居县",
            "parent_id": "331000",
            "level": "3",
            "full_name": "浙江省-台州市-仙居县"
        },
        {
            "id": "331081",
            "name": "温岭市",
            "parent_id": "331000",
            "level": "3",
            "full_name": "浙江省-台州市-温岭市"
        },
        {
            "id": "331082",
            "name": "临海市",
            "parent_id": "331000",
            "level": "3",
            "full_name": "浙江省-台州市-临海市"
        },
        {
            "id": "331100",
            "name": "丽水市",
            "parent_id": "330000",
            "level": "2",
            "full_name": "浙江省-丽水市"
        },
        {
            "id": "331101",
            "name": "市辖区",
            "parent_id": "331100",
            "level": "3",
            "full_name": "浙江省-丽水市-市辖区"
        },
        {
            "id": "331102",
            "name": "莲都区",
            "parent_id": "331100",
            "level": "3",
            "full_name": "浙江省-丽水市-莲都区"
        },
        {
            "id": "331121",
            "name": "青田县",
            "parent_id": "331100",
            "level": "3",
            "full_name": "浙江省-丽水市-青田县"
        },
        {
            "id": "331122",
            "name": "缙云县",
            "parent_id": "331100",
            "level": "3",
            "full_name": "浙江省-丽水市-缙云县"
        },
        {
            "id": "331123",
            "name": "遂昌县",
            "parent_id": "331100",
            "level": "3",
            "full_name": "浙江省-丽水市-遂昌县"
        },
        {
            "id": "331124",
            "name": "松阳县",
            "parent_id": "331100",
            "level": "3",
            "full_name": "浙江省-丽水市-松阳县"
        },
        {
            "id": "331125",
            "name": "云和县",
            "parent_id": "331100",
            "level": "3",
            "full_name": "浙江省-丽水市-云和县"
        },
        {
            "id": "331126",
            "name": "庆元县",
            "parent_id": "331100",
            "level": "3",
            "full_name": "浙江省-丽水市-庆元县"
        },
        {
            "id": "331127",
            "name": "景宁畲族自治县",
            "parent_id": "331100",
            "level": "3",
            "full_name": "浙江省-丽水市-景宁畲族自治县"
        },
        {
            "id": "331181",
            "name": "龙泉市",
            "parent_id": "331100",
            "level": "3",
            "full_name": "浙江省-丽水市-龙泉市"
        },
        {
            "id": "340000",
            "name": "安徽省",
            "parent_id": "0",
            "level": "1",
            "full_name": "安徽省"
        },
        {
            "id": "340100",
            "name": "合肥市",
            "parent_id": "340000",
            "level": "2",
            "full_name": "安徽省-合肥市"
        },
        {
            "id": "340101",
            "name": "市辖区",
            "parent_id": "340100",
            "level": "3",
            "full_name": "安徽省-合肥市-市辖区"
        },
        {
            "id": "340102",
            "name": "瑶海区",
            "parent_id": "340100",
            "level": "3",
            "full_name": "安徽省-合肥市-瑶海区"
        },
        {
            "id": "340103",
            "name": "庐阳区",
            "parent_id": "340100",
            "level": "3",
            "full_name": "安徽省-合肥市-庐阳区"
        },
        {
            "id": "340104",
            "name": "蜀山区",
            "parent_id": "340100",
            "level": "3",
            "full_name": "安徽省-合肥市-蜀山区"
        },
        {
            "id": "340111",
            "name": "包河区",
            "parent_id": "340100",
            "level": "3",
            "full_name": "安徽省-合肥市-包河区"
        },
        {
            "id": "340121",
            "name": "长丰县",
            "parent_id": "340100",
            "level": "3",
            "full_name": "安徽省-合肥市-长丰县"
        },
        {
            "id": "340122",
            "name": "肥东县",
            "parent_id": "340100",
            "level": "3",
            "full_name": "安徽省-合肥市-肥东县"
        },
        {
            "id": "340123",
            "name": "肥西县",
            "parent_id": "340100",
            "level": "3",
            "full_name": "安徽省-合肥市-肥西县"
        },
        {
            "id": "340124",
            "name": "庐江县",
            "parent_id": "340100",
            "level": "3",
            "full_name": "安徽省-合肥市-庐江县"
        },
        {
            "id": "340181",
            "name": "巢湖市",
            "parent_id": "340100",
            "level": "3",
            "full_name": "安徽省-合肥市-巢湖市"
        },
        {
            "id": "340200",
            "name": "芜湖市",
            "parent_id": "340000",
            "level": "2",
            "full_name": "安徽省-芜湖市"
        },
        {
            "id": "340201",
            "name": "市辖区",
            "parent_id": "340200",
            "level": "3",
            "full_name": "安徽省-芜湖市-市辖区"
        },
        {
            "id": "340202",
            "name": "镜湖区",
            "parent_id": "340200",
            "level": "3",
            "full_name": "安徽省-芜湖市-镜湖区"
        },
        {
            "id": "340203",
            "name": "弋江区",
            "parent_id": "340200",
            "level": "3",
            "full_name": "安徽省-芜湖市-弋江区"
        },
        {
            "id": "340207",
            "name": "鸠江区",
            "parent_id": "340200",
            "level": "3",
            "full_name": "安徽省-芜湖市-鸠江区"
        },
        {
            "id": "340208",
            "name": "三山区",
            "parent_id": "340200",
            "level": "3",
            "full_name": "安徽省-芜湖市-三山区"
        },
        {
            "id": "340221",
            "name": "芜湖县",
            "parent_id": "340200",
            "level": "3",
            "full_name": "安徽省-芜湖市-芜湖县"
        },
        {
            "id": "340222",
            "name": "繁昌县",
            "parent_id": "340200",
            "level": "3",
            "full_name": "安徽省-芜湖市-繁昌县"
        },
        {
            "id": "340223",
            "name": "南陵县",
            "parent_id": "340200",
            "level": "3",
            "full_name": "安徽省-芜湖市-南陵县"
        },
        {
            "id": "340225",
            "name": "无为县",
            "parent_id": "340200",
            "level": "3",
            "full_name": "安徽省-芜湖市-无为县"
        },
        {
            "id": "340300",
            "name": "蚌埠市",
            "parent_id": "340000",
            "level": "2",
            "full_name": "安徽省-蚌埠市"
        },
        {
            "id": "340301",
            "name": "市辖区",
            "parent_id": "340300",
            "level": "3",
            "full_name": "安徽省-蚌埠市-市辖区"
        },
        {
            "id": "340302",
            "name": "龙子湖区",
            "parent_id": "340300",
            "level": "3",
            "full_name": "安徽省-蚌埠市-龙子湖区"
        },
        {
            "id": "340303",
            "name": "蚌山区",
            "parent_id": "340300",
            "level": "3",
            "full_name": "安徽省-蚌埠市-蚌山区"
        },
        {
            "id": "340304",
            "name": "禹会区",
            "parent_id": "340300",
            "level": "3",
            "full_name": "安徽省-蚌埠市-禹会区"
        },
        {
            "id": "340311",
            "name": "淮上区",
            "parent_id": "340300",
            "level": "3",
            "full_name": "安徽省-蚌埠市-淮上区"
        },
        {
            "id": "340321",
            "name": "怀远县",
            "parent_id": "340300",
            "level": "3",
            "full_name": "安徽省-蚌埠市-怀远县"
        },
        {
            "id": "340322",
            "name": "五河县",
            "parent_id": "340300",
            "level": "3",
            "full_name": "安徽省-蚌埠市-五河县"
        },
        {
            "id": "340323",
            "name": "固镇县",
            "parent_id": "340300",
            "level": "3",
            "full_name": "安徽省-蚌埠市-固镇县"
        },
        {
            "id": "340400",
            "name": "淮南市",
            "parent_id": "340000",
            "level": "2",
            "full_name": "安徽省-淮南市"
        },
        {
            "id": "340401",
            "name": "市辖区",
            "parent_id": "340400",
            "level": "3",
            "full_name": "安徽省-淮南市-市辖区"
        },
        {
            "id": "340402",
            "name": "大通区",
            "parent_id": "340400",
            "level": "3",
            "full_name": "安徽省-淮南市-大通区"
        },
        {
            "id": "340403",
            "name": "田家庵区",
            "parent_id": "340400",
            "level": "3",
            "full_name": "安徽省-淮南市-田家庵区"
        },
        {
            "id": "340404",
            "name": "谢家集区",
            "parent_id": "340400",
            "level": "3",
            "full_name": "安徽省-淮南市-谢家集区"
        },
        {
            "id": "340405",
            "name": "八公山区",
            "parent_id": "340400",
            "level": "3",
            "full_name": "安徽省-淮南市-八公山区"
        },
        {
            "id": "340406",
            "name": "潘集区",
            "parent_id": "340400",
            "level": "3",
            "full_name": "安徽省-淮南市-潘集区"
        },
        {
            "id": "340421",
            "name": "凤台县",
            "parent_id": "340400",
            "level": "3",
            "full_name": "安徽省-淮南市-凤台县"
        },
        {
            "id": "340500",
            "name": "马鞍山市",
            "parent_id": "340000",
            "level": "2",
            "full_name": "安徽省-马鞍山市"
        },
        {
            "id": "340501",
            "name": "市辖区",
            "parent_id": "340500",
            "level": "3",
            "full_name": "安徽省-马鞍山市-市辖区"
        },
        {
            "id": "340503",
            "name": "花山区",
            "parent_id": "340500",
            "level": "3",
            "full_name": "安徽省-马鞍山市-花山区"
        },
        {
            "id": "340504",
            "name": "雨山区",
            "parent_id": "340500",
            "level": "3",
            "full_name": "安徽省-马鞍山市-雨山区"
        },
        {
            "id": "340506",
            "name": "博望区",
            "parent_id": "340500",
            "level": "3",
            "full_name": "安徽省-马鞍山市-博望区"
        },
        {
            "id": "340521",
            "name": "当涂县",
            "parent_id": "340500",
            "level": "3",
            "full_name": "安徽省-马鞍山市-当涂县"
        },
        {
            "id": "340522",
            "name": "含山县",
            "parent_id": "340500",
            "level": "3",
            "full_name": "安徽省-马鞍山市-含山县"
        },
        {
            "id": "340523",
            "name": "和县",
            "parent_id": "340500",
            "level": "3",
            "full_name": "安徽省-马鞍山市-和县"
        },
        {
            "id": "340600",
            "name": "淮北市",
            "parent_id": "340000",
            "level": "2",
            "full_name": "安徽省-淮北市"
        },
        {
            "id": "340601",
            "name": "市辖区",
            "parent_id": "340600",
            "level": "3",
            "full_name": "安徽省-淮北市-市辖区"
        },
        {
            "id": "340602",
            "name": "杜集区",
            "parent_id": "340600",
            "level": "3",
            "full_name": "安徽省-淮北市-杜集区"
        },
        {
            "id": "340603",
            "name": "相山区",
            "parent_id": "340600",
            "level": "3",
            "full_name": "安徽省-淮北市-相山区"
        },
        {
            "id": "340604",
            "name": "烈山区",
            "parent_id": "340600",
            "level": "3",
            "full_name": "安徽省-淮北市-烈山区"
        },
        {
            "id": "340621",
            "name": "濉溪县",
            "parent_id": "340600",
            "level": "3",
            "full_name": "安徽省-淮北市-濉溪县"
        },
        {
            "id": "340700",
            "name": "铜陵市",
            "parent_id": "340000",
            "level": "2",
            "full_name": "安徽省-铜陵市"
        },
        {
            "id": "340701",
            "name": "市辖区",
            "parent_id": "340700",
            "level": "3",
            "full_name": "安徽省-铜陵市-市辖区"
        },
        {
            "id": "340702",
            "name": "铜官山区",
            "parent_id": "340700",
            "level": "3",
            "full_name": "安徽省-铜陵市-铜官山区"
        },
        {
            "id": "340703",
            "name": "狮子山区",
            "parent_id": "340700",
            "level": "3",
            "full_name": "安徽省-铜陵市-狮子山区"
        },
        {
            "id": "340711",
            "name": "郊区",
            "parent_id": "340700",
            "level": "3",
            "full_name": "安徽省-铜陵市-郊区"
        },
        {
            "id": "340721",
            "name": "铜陵县",
            "parent_id": "340700",
            "level": "3",
            "full_name": "安徽省-铜陵市-铜陵县"
        },
        {
            "id": "340800",
            "name": "安庆市",
            "parent_id": "340000",
            "level": "2",
            "full_name": "安徽省-安庆市"
        },
        {
            "id": "340801",
            "name": "市辖区",
            "parent_id": "340800",
            "level": "3",
            "full_name": "安徽省-安庆市-市辖区"
        },
        {
            "id": "340802",
            "name": "迎江区",
            "parent_id": "340800",
            "level": "3",
            "full_name": "安徽省-安庆市-迎江区"
        },
        {
            "id": "340803",
            "name": "大观区",
            "parent_id": "340800",
            "level": "3",
            "full_name": "安徽省-安庆市-大观区"
        },
        {
            "id": "340811",
            "name": "宜秀区",
            "parent_id": "340800",
            "level": "3",
            "full_name": "安徽省-安庆市-宜秀区"
        },
        {
            "id": "340822",
            "name": "怀宁县",
            "parent_id": "340800",
            "level": "3",
            "full_name": "安徽省-安庆市-怀宁县"
        },
        {
            "id": "340823",
            "name": "枞阳县",
            "parent_id": "340800",
            "level": "3",
            "full_name": "安徽省-安庆市-枞阳县"
        },
        {
            "id": "340824",
            "name": "潜山县",
            "parent_id": "340800",
            "level": "3",
            "full_name": "安徽省-安庆市-潜山县"
        },
        {
            "id": "340825",
            "name": "太湖县",
            "parent_id": "340800",
            "level": "3",
            "full_name": "安徽省-安庆市-太湖县"
        },
        {
            "id": "340826",
            "name": "宿松县",
            "parent_id": "340800",
            "level": "3",
            "full_name": "安徽省-安庆市-宿松县"
        },
        {
            "id": "340827",
            "name": "望江县",
            "parent_id": "340800",
            "level": "3",
            "full_name": "安徽省-安庆市-望江县"
        },
        {
            "id": "340828",
            "name": "岳西县",
            "parent_id": "340800",
            "level": "3",
            "full_name": "安徽省-安庆市-岳西县"
        },
        {
            "id": "340881",
            "name": "桐城市",
            "parent_id": "340800",
            "level": "3",
            "full_name": "安徽省-安庆市-桐城市"
        },
        {
            "id": "341000",
            "name": "黄山市",
            "parent_id": "340000",
            "level": "2",
            "full_name": "安徽省-黄山市"
        },
        {
            "id": "341001",
            "name": "市辖区",
            "parent_id": "341000",
            "level": "3",
            "full_name": "安徽省-黄山市-市辖区"
        },
        {
            "id": "341002",
            "name": "屯溪区",
            "parent_id": "341000",
            "level": "3",
            "full_name": "安徽省-黄山市-屯溪区"
        },
        {
            "id": "341003",
            "name": "黄山区",
            "parent_id": "341000",
            "level": "3",
            "full_name": "安徽省-黄山市-黄山区"
        },
        {
            "id": "341004",
            "name": "徽州区",
            "parent_id": "341000",
            "level": "3",
            "full_name": "安徽省-黄山市-徽州区"
        },
        {
            "id": "341021",
            "name": "歙县",
            "parent_id": "341000",
            "level": "3",
            "full_name": "安徽省-黄山市-歙县"
        },
        {
            "id": "341022",
            "name": "休宁县",
            "parent_id": "341000",
            "level": "3",
            "full_name": "安徽省-黄山市-休宁县"
        },
        {
            "id": "341023",
            "name": "黟县",
            "parent_id": "341000",
            "level": "3",
            "full_name": "安徽省-黄山市-黟县"
        },
        {
            "id": "341024",
            "name": "祁门县",
            "parent_id": "341000",
            "level": "3",
            "full_name": "安徽省-黄山市-祁门县"
        },
        {
            "id": "341100",
            "name": "滁州市",
            "parent_id": "340000",
            "level": "2",
            "full_name": "安徽省-滁州市"
        },
        {
            "id": "341101",
            "name": "市辖区",
            "parent_id": "341100",
            "level": "3",
            "full_name": "安徽省-滁州市-市辖区"
        },
        {
            "id": "341102",
            "name": "琅琊区",
            "parent_id": "341100",
            "level": "3",
            "full_name": "安徽省-滁州市-琅琊区"
        },
        {
            "id": "341103",
            "name": "南谯区",
            "parent_id": "341100",
            "level": "3",
            "full_name": "安徽省-滁州市-南谯区"
        },
        {
            "id": "341122",
            "name": "来安县",
            "parent_id": "341100",
            "level": "3",
            "full_name": "安徽省-滁州市-来安县"
        },
        {
            "id": "341124",
            "name": "全椒县",
            "parent_id": "341100",
            "level": "3",
            "full_name": "安徽省-滁州市-全椒县"
        },
        {
            "id": "341125",
            "name": "定远县",
            "parent_id": "341100",
            "level": "3",
            "full_name": "安徽省-滁州市-定远县"
        },
        {
            "id": "341126",
            "name": "凤阳县",
            "parent_id": "341100",
            "level": "3",
            "full_name": "安徽省-滁州市-凤阳县"
        },
        {
            "id": "341181",
            "name": "天长市",
            "parent_id": "341100",
            "level": "3",
            "full_name": "安徽省-滁州市-天长市"
        },
        {
            "id": "341182",
            "name": "明光市",
            "parent_id": "341100",
            "level": "3",
            "full_name": "安徽省-滁州市-明光市"
        },
        {
            "id": "341200",
            "name": "阜阳市",
            "parent_id": "340000",
            "level": "2",
            "full_name": "安徽省-阜阳市"
        },
        {
            "id": "341201",
            "name": "市辖区",
            "parent_id": "341200",
            "level": "3",
            "full_name": "安徽省-阜阳市-市辖区"
        },
        {
            "id": "341202",
            "name": "颍州区",
            "parent_id": "341200",
            "level": "3",
            "full_name": "安徽省-阜阳市-颍州区"
        },
        {
            "id": "341203",
            "name": "颍东区",
            "parent_id": "341200",
            "level": "3",
            "full_name": "安徽省-阜阳市-颍东区"
        },
        {
            "id": "341204",
            "name": "颍泉区",
            "parent_id": "341200",
            "level": "3",
            "full_name": "安徽省-阜阳市-颍泉区"
        },
        {
            "id": "341221",
            "name": "临泉县",
            "parent_id": "341200",
            "level": "3",
            "full_name": "安徽省-阜阳市-临泉县"
        },
        {
            "id": "341222",
            "name": "太和县",
            "parent_id": "341200",
            "level": "3",
            "full_name": "安徽省-阜阳市-太和县"
        },
        {
            "id": "341225",
            "name": "阜南县",
            "parent_id": "341200",
            "level": "3",
            "full_name": "安徽省-阜阳市-阜南县"
        },
        {
            "id": "341226",
            "name": "颍上县",
            "parent_id": "341200",
            "level": "3",
            "full_name": "安徽省-阜阳市-颍上县"
        },
        {
            "id": "341282",
            "name": "界首市",
            "parent_id": "341200",
            "level": "3",
            "full_name": "安徽省-阜阳市-界首市"
        },
        {
            "id": "341300",
            "name": "宿州市",
            "parent_id": "340000",
            "level": "2",
            "full_name": "安徽省-宿州市"
        },
        {
            "id": "341301",
            "name": "市辖区",
            "parent_id": "341300",
            "level": "3",
            "full_name": "安徽省-宿州市-市辖区"
        },
        {
            "id": "341302",
            "name": "埇桥区",
            "parent_id": "341300",
            "level": "3",
            "full_name": "安徽省-宿州市-埇桥区"
        },
        {
            "id": "341321",
            "name": "砀山县",
            "parent_id": "341300",
            "level": "3",
            "full_name": "安徽省-宿州市-砀山县"
        },
        {
            "id": "341322",
            "name": "萧县",
            "parent_id": "341300",
            "level": "3",
            "full_name": "安徽省-宿州市-萧县"
        },
        {
            "id": "341323",
            "name": "灵璧县",
            "parent_id": "341300",
            "level": "3",
            "full_name": "安徽省-宿州市-灵璧县"
        },
        {
            "id": "341324",
            "name": "泗县",
            "parent_id": "341300",
            "level": "3",
            "full_name": "安徽省-宿州市-泗县"
        },
        {
            "id": "341500",
            "name": "六安市",
            "parent_id": "340000",
            "level": "2",
            "full_name": "安徽省-六安市"
        },
        {
            "id": "341501",
            "name": "市辖区",
            "parent_id": "341500",
            "level": "3",
            "full_name": "安徽省-六安市-市辖区"
        },
        {
            "id": "341502",
            "name": "金安区",
            "parent_id": "341500",
            "level": "3",
            "full_name": "安徽省-六安市-金安区"
        },
        {
            "id": "341503",
            "name": "裕安区",
            "parent_id": "341500",
            "level": "3",
            "full_name": "安徽省-六安市-裕安区"
        },
        {
            "id": "341521",
            "name": "寿县",
            "parent_id": "341500",
            "level": "3",
            "full_name": "安徽省-六安市-寿县"
        },
        {
            "id": "341522",
            "name": "霍邱县",
            "parent_id": "341500",
            "level": "3",
            "full_name": "安徽省-六安市-霍邱县"
        },
        {
            "id": "341523",
            "name": "舒城县",
            "parent_id": "341500",
            "level": "3",
            "full_name": "安徽省-六安市-舒城县"
        },
        {
            "id": "341524",
            "name": "金寨县",
            "parent_id": "341500",
            "level": "3",
            "full_name": "安徽省-六安市-金寨县"
        },
        {
            "id": "341525",
            "name": "霍山县",
            "parent_id": "341500",
            "level": "3",
            "full_name": "安徽省-六安市-霍山县"
        },
        {
            "id": "341600",
            "name": "亳州市",
            "parent_id": "340000",
            "level": "2",
            "full_name": "安徽省-亳州市"
        },
        {
            "id": "341601",
            "name": "市辖区",
            "parent_id": "341600",
            "level": "3",
            "full_name": "安徽省-亳州市-市辖区"
        },
        {
            "id": "341602",
            "name": "谯城区",
            "parent_id": "341600",
            "level": "3",
            "full_name": "安徽省-亳州市-谯城区"
        },
        {
            "id": "341621",
            "name": "涡阳县",
            "parent_id": "341600",
            "level": "3",
            "full_name": "安徽省-亳州市-涡阳县"
        },
        {
            "id": "341622",
            "name": "蒙城县",
            "parent_id": "341600",
            "level": "3",
            "full_name": "安徽省-亳州市-蒙城县"
        },
        {
            "id": "341623",
            "name": "利辛县",
            "parent_id": "341600",
            "level": "3",
            "full_name": "安徽省-亳州市-利辛县"
        },
        {
            "id": "341700",
            "name": "池州市",
            "parent_id": "340000",
            "level": "2",
            "full_name": "安徽省-池州市"
        },
        {
            "id": "341701",
            "name": "市辖区",
            "parent_id": "341700",
            "level": "3",
            "full_name": "安徽省-池州市-市辖区"
        },
        {
            "id": "341702",
            "name": "贵池区",
            "parent_id": "341700",
            "level": "3",
            "full_name": "安徽省-池州市-贵池区"
        },
        {
            "id": "341721",
            "name": "东至县",
            "parent_id": "341700",
            "level": "3",
            "full_name": "安徽省-池州市-东至县"
        },
        {
            "id": "341722",
            "name": "石台县",
            "parent_id": "341700",
            "level": "3",
            "full_name": "安徽省-池州市-石台县"
        },
        {
            "id": "341723",
            "name": "青阳县",
            "parent_id": "341700",
            "level": "3",
            "full_name": "安徽省-池州市-青阳县"
        },
        {
            "id": "341800",
            "name": "宣城市",
            "parent_id": "340000",
            "level": "2",
            "full_name": "安徽省-宣城市"
        },
        {
            "id": "341801",
            "name": "市辖区",
            "parent_id": "341800",
            "level": "3",
            "full_name": "安徽省-宣城市-市辖区"
        },
        {
            "id": "341802",
            "name": "宣州区",
            "parent_id": "341800",
            "level": "3",
            "full_name": "安徽省-宣城市-宣州区"
        },
        {
            "id": "341821",
            "name": "郎溪县",
            "parent_id": "341800",
            "level": "3",
            "full_name": "安徽省-宣城市-郎溪县"
        },
        {
            "id": "341822",
            "name": "广德县",
            "parent_id": "341800",
            "level": "3",
            "full_name": "安徽省-宣城市-广德县"
        },
        {
            "id": "341823",
            "name": "泾县",
            "parent_id": "341800",
            "level": "3",
            "full_name": "安徽省-宣城市-泾县"
        },
        {
            "id": "341824",
            "name": "绩溪县",
            "parent_id": "341800",
            "level": "3",
            "full_name": "安徽省-宣城市-绩溪县"
        },
        {
            "id": "341825",
            "name": "旌德县",
            "parent_id": "341800",
            "level": "3",
            "full_name": "安徽省-宣城市-旌德县"
        },
        {
            "id": "341881",
            "name": "宁国市",
            "parent_id": "341800",
            "level": "3",
            "full_name": "安徽省-宣城市-宁国市"
        },
        {
            "id": "350000",
            "name": "福建省",
            "parent_id": "0",
            "level": "1",
            "full_name": "福建省"
        },
        {
            "id": "350100",
            "name": "福州市",
            "parent_id": "350000",
            "level": "2",
            "full_name": "福建省-福州市"
        },
        {
            "id": "350101",
            "name": "市辖区",
            "parent_id": "350100",
            "level": "3",
            "full_name": "福建省-福州市-市辖区"
        },
        {
            "id": "350102",
            "name": "鼓楼区",
            "parent_id": "350100",
            "level": "3",
            "full_name": "福建省-福州市-鼓楼区"
        },
        {
            "id": "350103",
            "name": "台江区",
            "parent_id": "350100",
            "level": "3",
            "full_name": "福建省-福州市-台江区"
        },
        {
            "id": "350104",
            "name": "仓山区",
            "parent_id": "350100",
            "level": "3",
            "full_name": "福建省-福州市-仓山区"
        },
        {
            "id": "350105",
            "name": "马尾区",
            "parent_id": "350100",
            "level": "3",
            "full_name": "福建省-福州市-马尾区"
        },
        {
            "id": "350111",
            "name": "晋安区",
            "parent_id": "350100",
            "level": "3",
            "full_name": "福建省-福州市-晋安区"
        },
        {
            "id": "350121",
            "name": "闽侯县",
            "parent_id": "350100",
            "level": "3",
            "full_name": "福建省-福州市-闽侯县"
        },
        {
            "id": "350122",
            "name": "连江县",
            "parent_id": "350100",
            "level": "3",
            "full_name": "福建省-福州市-连江县"
        },
        {
            "id": "350123",
            "name": "罗源县",
            "parent_id": "350100",
            "level": "3",
            "full_name": "福建省-福州市-罗源县"
        },
        {
            "id": "350124",
            "name": "闽清县",
            "parent_id": "350100",
            "level": "3",
            "full_name": "福建省-福州市-闽清县"
        },
        {
            "id": "350125",
            "name": "永泰县",
            "parent_id": "350100",
            "level": "3",
            "full_name": "福建省-福州市-永泰县"
        },
        {
            "id": "350128",
            "name": "平潭县",
            "parent_id": "350100",
            "level": "3",
            "full_name": "福建省-福州市-平潭县"
        },
        {
            "id": "350181",
            "name": "福清市",
            "parent_id": "350100",
            "level": "3",
            "full_name": "福建省-福州市-福清市"
        },
        {
            "id": "350182",
            "name": "长乐市",
            "parent_id": "350100",
            "level": "3",
            "full_name": "福建省-福州市-长乐市"
        },
        {
            "id": "350200",
            "name": "厦门市",
            "parent_id": "350000",
            "level": "2",
            "full_name": "福建省-厦门市"
        },
        {
            "id": "350201",
            "name": "市辖区",
            "parent_id": "350200",
            "level": "3",
            "full_name": "福建省-厦门市-市辖区"
        },
        {
            "id": "350203",
            "name": "思明区",
            "parent_id": "350200",
            "level": "3",
            "full_name": "福建省-厦门市-思明区"
        },
        {
            "id": "350205",
            "name": "海沧区",
            "parent_id": "350200",
            "level": "3",
            "full_name": "福建省-厦门市-海沧区"
        },
        {
            "id": "350206",
            "name": "湖里区",
            "parent_id": "350200",
            "level": "3",
            "full_name": "福建省-厦门市-湖里区"
        },
        {
            "id": "350211",
            "name": "集美区",
            "parent_id": "350200",
            "level": "3",
            "full_name": "福建省-厦门市-集美区"
        },
        {
            "id": "350212",
            "name": "同安区",
            "parent_id": "350200",
            "level": "3",
            "full_name": "福建省-厦门市-同安区"
        },
        {
            "id": "350213",
            "name": "翔安区",
            "parent_id": "350200",
            "level": "3",
            "full_name": "福建省-厦门市-翔安区"
        },
        {
            "id": "350300",
            "name": "莆田市",
            "parent_id": "350000",
            "level": "2",
            "full_name": "福建省-莆田市"
        },
        {
            "id": "350301",
            "name": "市辖区",
            "parent_id": "350300",
            "level": "3",
            "full_name": "福建省-莆田市-市辖区"
        },
        {
            "id": "350302",
            "name": "城厢区",
            "parent_id": "350300",
            "level": "3",
            "full_name": "福建省-莆田市-城厢区"
        },
        {
            "id": "350303",
            "name": "涵江区",
            "parent_id": "350300",
            "level": "3",
            "full_name": "福建省-莆田市-涵江区"
        },
        {
            "id": "350304",
            "name": "荔城区",
            "parent_id": "350300",
            "level": "3",
            "full_name": "福建省-莆田市-荔城区"
        },
        {
            "id": "350305",
            "name": "秀屿区",
            "parent_id": "350300",
            "level": "3",
            "full_name": "福建省-莆田市-秀屿区"
        },
        {
            "id": "350322",
            "name": "仙游县",
            "parent_id": "350300",
            "level": "3",
            "full_name": "福建省-莆田市-仙游县"
        },
        {
            "id": "350400",
            "name": "三明市",
            "parent_id": "350000",
            "level": "2",
            "full_name": "福建省-三明市"
        },
        {
            "id": "350401",
            "name": "市辖区",
            "parent_id": "350400",
            "level": "3",
            "full_name": "福建省-三明市-市辖区"
        },
        {
            "id": "350402",
            "name": "梅列区",
            "parent_id": "350400",
            "level": "3",
            "full_name": "福建省-三明市-梅列区"
        },
        {
            "id": "350403",
            "name": "三元区",
            "parent_id": "350400",
            "level": "3",
            "full_name": "福建省-三明市-三元区"
        },
        {
            "id": "350421",
            "name": "明溪县",
            "parent_id": "350400",
            "level": "3",
            "full_name": "福建省-三明市-明溪县"
        },
        {
            "id": "350423",
            "name": "清流县",
            "parent_id": "350400",
            "level": "3",
            "full_name": "福建省-三明市-清流县"
        },
        {
            "id": "350424",
            "name": "宁化县",
            "parent_id": "350400",
            "level": "3",
            "full_name": "福建省-三明市-宁化县"
        },
        {
            "id": "350425",
            "name": "大田县",
            "parent_id": "350400",
            "level": "3",
            "full_name": "福建省-三明市-大田县"
        },
        {
            "id": "350426",
            "name": "尤溪县",
            "parent_id": "350400",
            "level": "3",
            "full_name": "福建省-三明市-尤溪县"
        },
        {
            "id": "350427",
            "name": "沙县",
            "parent_id": "350400",
            "level": "3",
            "full_name": "福建省-三明市-沙县"
        },
        {
            "id": "350428",
            "name": "将乐县",
            "parent_id": "350400",
            "level": "3",
            "full_name": "福建省-三明市-将乐县"
        },
        {
            "id": "350429",
            "name": "泰宁县",
            "parent_id": "350400",
            "level": "3",
            "full_name": "福建省-三明市-泰宁县"
        },
        {
            "id": "350430",
            "name": "建宁县",
            "parent_id": "350400",
            "level": "3",
            "full_name": "福建省-三明市-建宁县"
        },
        {
            "id": "350481",
            "name": "永安市",
            "parent_id": "350400",
            "level": "3",
            "full_name": "福建省-三明市-永安市"
        },
        {
            "id": "350500",
            "name": "泉州市",
            "parent_id": "350000",
            "level": "2",
            "full_name": "福建省-泉州市"
        },
        {
            "id": "350501",
            "name": "市辖区",
            "parent_id": "350500",
            "level": "3",
            "full_name": "福建省-泉州市-市辖区"
        },
        {
            "id": "350502",
            "name": "鲤城区",
            "parent_id": "350500",
            "level": "3",
            "full_name": "福建省-泉州市-鲤城区"
        },
        {
            "id": "350503",
            "name": "丰泽区",
            "parent_id": "350500",
            "level": "3",
            "full_name": "福建省-泉州市-丰泽区"
        },
        {
            "id": "350504",
            "name": "洛江区",
            "parent_id": "350500",
            "level": "3",
            "full_name": "福建省-泉州市-洛江区"
        },
        {
            "id": "350505",
            "name": "泉港区",
            "parent_id": "350500",
            "level": "3",
            "full_name": "福建省-泉州市-泉港区"
        },
        {
            "id": "350521",
            "name": "惠安县",
            "parent_id": "350500",
            "level": "3",
            "full_name": "福建省-泉州市-惠安县"
        },
        {
            "id": "350524",
            "name": "安溪县",
            "parent_id": "350500",
            "level": "3",
            "full_name": "福建省-泉州市-安溪县"
        },
        {
            "id": "350525",
            "name": "永春县",
            "parent_id": "350500",
            "level": "3",
            "full_name": "福建省-泉州市-永春县"
        },
        {
            "id": "350526",
            "name": "德化县",
            "parent_id": "350500",
            "level": "3",
            "full_name": "福建省-泉州市-德化县"
        },
        {
            "id": "350527",
            "name": "金门县",
            "parent_id": "350500",
            "level": "3",
            "full_name": "福建省-泉州市-金门县"
        },
        {
            "id": "350581",
            "name": "石狮市",
            "parent_id": "350500",
            "level": "3",
            "full_name": "福建省-泉州市-石狮市"
        },
        {
            "id": "350582",
            "name": "晋江市",
            "parent_id": "350500",
            "level": "3",
            "full_name": "福建省-泉州市-晋江市"
        },
        {
            "id": "350583",
            "name": "南安市",
            "parent_id": "350500",
            "level": "3",
            "full_name": "福建省-泉州市-南安市"
        },
        {
            "id": "350600",
            "name": "漳州市",
            "parent_id": "350000",
            "level": "2",
            "full_name": "福建省-漳州市"
        },
        {
            "id": "350601",
            "name": "市辖区",
            "parent_id": "350600",
            "level": "3",
            "full_name": "福建省-漳州市-市辖区"
        },
        {
            "id": "350602",
            "name": "芗城区",
            "parent_id": "350600",
            "level": "3",
            "full_name": "福建省-漳州市-芗城区"
        },
        {
            "id": "350603",
            "name": "龙文区",
            "parent_id": "350600",
            "level": "3",
            "full_name": "福建省-漳州市-龙文区"
        },
        {
            "id": "350622",
            "name": "云霄县",
            "parent_id": "350600",
            "level": "3",
            "full_name": "福建省-漳州市-云霄县"
        },
        {
            "id": "350623",
            "name": "漳浦县",
            "parent_id": "350600",
            "level": "3",
            "full_name": "福建省-漳州市-漳浦县"
        },
        {
            "id": "350624",
            "name": "诏安县",
            "parent_id": "350600",
            "level": "3",
            "full_name": "福建省-漳州市-诏安县"
        },
        {
            "id": "350625",
            "name": "长泰县",
            "parent_id": "350600",
            "level": "3",
            "full_name": "福建省-漳州市-长泰县"
        },
        {
            "id": "350626",
            "name": "东山县",
            "parent_id": "350600",
            "level": "3",
            "full_name": "福建省-漳州市-东山县"
        },
        {
            "id": "350627",
            "name": "南靖县",
            "parent_id": "350600",
            "level": "3",
            "full_name": "福建省-漳州市-南靖县"
        },
        {
            "id": "350628",
            "name": "平和县",
            "parent_id": "350600",
            "level": "3",
            "full_name": "福建省-漳州市-平和县"
        },
        {
            "id": "350629",
            "name": "华安县",
            "parent_id": "350600",
            "level": "3",
            "full_name": "福建省-漳州市-华安县"
        },
        {
            "id": "350681",
            "name": "龙海市",
            "parent_id": "350600",
            "level": "3",
            "full_name": "福建省-漳州市-龙海市"
        },
        {
            "id": "350700",
            "name": "南平市",
            "parent_id": "350000",
            "level": "2",
            "full_name": "福建省-南平市"
        },
        {
            "id": "350701",
            "name": "市辖区",
            "parent_id": "350700",
            "level": "3",
            "full_name": "福建省-南平市-市辖区"
        },
        {
            "id": "350702",
            "name": "延平区",
            "parent_id": "350700",
            "level": "3",
            "full_name": "福建省-南平市-延平区"
        },
        {
            "id": "350703",
            "name": "建阳区",
            "parent_id": "350700",
            "level": "3",
            "full_name": "福建省-南平市-建阳区"
        },
        {
            "id": "350721",
            "name": "顺昌县",
            "parent_id": "350700",
            "level": "3",
            "full_name": "福建省-南平市-顺昌县"
        },
        {
            "id": "350722",
            "name": "浦城县",
            "parent_id": "350700",
            "level": "3",
            "full_name": "福建省-南平市-浦城县"
        },
        {
            "id": "350723",
            "name": "光泽县",
            "parent_id": "350700",
            "level": "3",
            "full_name": "福建省-南平市-光泽县"
        },
        {
            "id": "350724",
            "name": "松溪县",
            "parent_id": "350700",
            "level": "3",
            "full_name": "福建省-南平市-松溪县"
        },
        {
            "id": "350725",
            "name": "政和县",
            "parent_id": "350700",
            "level": "3",
            "full_name": "福建省-南平市-政和县"
        },
        {
            "id": "350781",
            "name": "邵武市",
            "parent_id": "350700",
            "level": "3",
            "full_name": "福建省-南平市-邵武市"
        },
        {
            "id": "350782",
            "name": "武夷山市",
            "parent_id": "350700",
            "level": "3",
            "full_name": "福建省-南平市-武夷山市"
        },
        {
            "id": "350783",
            "name": "建瓯市",
            "parent_id": "350700",
            "level": "3",
            "full_name": "福建省-南平市-建瓯市"
        },
        {
            "id": "350800",
            "name": "龙岩市",
            "parent_id": "350000",
            "level": "2",
            "full_name": "福建省-龙岩市"
        },
        {
            "id": "350801",
            "name": "市辖区",
            "parent_id": "350800",
            "level": "3",
            "full_name": "福建省-龙岩市-市辖区"
        },
        {
            "id": "350802",
            "name": "新罗区",
            "parent_id": "350800",
            "level": "3",
            "full_name": "福建省-龙岩市-新罗区"
        },
        {
            "id": "350803",
            "name": "永定区",
            "parent_id": "350800",
            "level": "3",
            "full_name": "福建省-龙岩市-永定区"
        },
        {
            "id": "350821",
            "name": "长汀县",
            "parent_id": "350800",
            "level": "3",
            "full_name": "福建省-龙岩市-长汀县"
        },
        {
            "id": "350823",
            "name": "上杭县",
            "parent_id": "350800",
            "level": "3",
            "full_name": "福建省-龙岩市-上杭县"
        },
        {
            "id": "350824",
            "name": "武平县",
            "parent_id": "350800",
            "level": "3",
            "full_name": "福建省-龙岩市-武平县"
        },
        {
            "id": "350825",
            "name": "连城县",
            "parent_id": "350800",
            "level": "3",
            "full_name": "福建省-龙岩市-连城县"
        },
        {
            "id": "350881",
            "name": "漳平市",
            "parent_id": "350800",
            "level": "3",
            "full_name": "福建省-龙岩市-漳平市"
        },
        {
            "id": "350900",
            "name": "宁德市",
            "parent_id": "350000",
            "level": "2",
            "full_name": "福建省-宁德市"
        },
        {
            "id": "350901",
            "name": "市辖区",
            "parent_id": "350900",
            "level": "3",
            "full_name": "福建省-宁德市-市辖区"
        },
        {
            "id": "350902",
            "name": "蕉城区",
            "parent_id": "350900",
            "level": "3",
            "full_name": "福建省-宁德市-蕉城区"
        },
        {
            "id": "350921",
            "name": "霞浦县",
            "parent_id": "350900",
            "level": "3",
            "full_name": "福建省-宁德市-霞浦县"
        },
        {
            "id": "350922",
            "name": "古田县",
            "parent_id": "350900",
            "level": "3",
            "full_name": "福建省-宁德市-古田县"
        },
        {
            "id": "350923",
            "name": "屏南县",
            "parent_id": "350900",
            "level": "3",
            "full_name": "福建省-宁德市-屏南县"
        },
        {
            "id": "350924",
            "name": "寿宁县",
            "parent_id": "350900",
            "level": "3",
            "full_name": "福建省-宁德市-寿宁县"
        },
        {
            "id": "350925",
            "name": "周宁县",
            "parent_id": "350900",
            "level": "3",
            "full_name": "福建省-宁德市-周宁县"
        },
        {
            "id": "350926",
            "name": "柘荣县",
            "parent_id": "350900",
            "level": "3",
            "full_name": "福建省-宁德市-柘荣县"
        },
        {
            "id": "350981",
            "name": "福安市",
            "parent_id": "350900",
            "level": "3",
            "full_name": "福建省-宁德市-福安市"
        },
        {
            "id": "350982",
            "name": "福鼎市",
            "parent_id": "350900",
            "level": "3",
            "full_name": "福建省-宁德市-福鼎市"
        },
        {
            "id": "360000",
            "name": "江西省",
            "parent_id": "0",
            "level": "1",
            "full_name": "江西省"
        },
        {
            "id": "360100",
            "name": "南昌市",
            "parent_id": "360000",
            "level": "2",
            "full_name": "江西省-南昌市"
        },
        {
            "id": "360101",
            "name": "市辖区",
            "parent_id": "360100",
            "level": "3",
            "full_name": "江西省-南昌市-市辖区"
        },
        {
            "id": "360102",
            "name": "东湖区",
            "parent_id": "360100",
            "level": "3",
            "full_name": "江西省-南昌市-东湖区"
        },
        {
            "id": "360103",
            "name": "西湖区",
            "parent_id": "360100",
            "level": "3",
            "full_name": "江西省-南昌市-西湖区"
        },
        {
            "id": "360104",
            "name": "青云谱区",
            "parent_id": "360100",
            "level": "3",
            "full_name": "江西省-南昌市-青云谱区"
        },
        {
            "id": "360105",
            "name": "湾里区",
            "parent_id": "360100",
            "level": "3",
            "full_name": "江西省-南昌市-湾里区"
        },
        {
            "id": "360111",
            "name": "青山湖区",
            "parent_id": "360100",
            "level": "3",
            "full_name": "江西省-南昌市-青山湖区"
        },
        {
            "id": "360112",
            "name": "新建区",
            "parent_id": "360100",
            "level": "3",
            "full_name": "江西省-南昌市-新建区"
        },
        {
            "id": "360121",
            "name": "南昌县",
            "parent_id": "360100",
            "level": "3",
            "full_name": "江西省-南昌市-南昌县"
        },
        {
            "id": "360123",
            "name": "安义县",
            "parent_id": "360100",
            "level": "3",
            "full_name": "江西省-南昌市-安义县"
        },
        {
            "id": "360124",
            "name": "进贤县",
            "parent_id": "360100",
            "level": "3",
            "full_name": "江西省-南昌市-进贤县"
        },
        {
            "id": "360200",
            "name": "景德镇市",
            "parent_id": "360000",
            "level": "2",
            "full_name": "江西省-景德镇市"
        },
        {
            "id": "360201",
            "name": "市辖区",
            "parent_id": "360200",
            "level": "3",
            "full_name": "江西省-景德镇市-市辖区"
        },
        {
            "id": "360202",
            "name": "昌江区",
            "parent_id": "360200",
            "level": "3",
            "full_name": "江西省-景德镇市-昌江区"
        },
        {
            "id": "360203",
            "name": "珠山区",
            "parent_id": "360200",
            "level": "3",
            "full_name": "江西省-景德镇市-珠山区"
        },
        {
            "id": "360222",
            "name": "浮梁县",
            "parent_id": "360200",
            "level": "3",
            "full_name": "江西省-景德镇市-浮梁县"
        },
        {
            "id": "360281",
            "name": "乐平市",
            "parent_id": "360200",
            "level": "3",
            "full_name": "江西省-景德镇市-乐平市"
        },
        {
            "id": "360300",
            "name": "萍乡市",
            "parent_id": "360000",
            "level": "2",
            "full_name": "江西省-萍乡市"
        },
        {
            "id": "360301",
            "name": "市辖区",
            "parent_id": "360300",
            "level": "3",
            "full_name": "江西省-萍乡市-市辖区"
        },
        {
            "id": "360302",
            "name": "安源区",
            "parent_id": "360300",
            "level": "3",
            "full_name": "江西省-萍乡市-安源区"
        },
        {
            "id": "360313",
            "name": "湘东区",
            "parent_id": "360300",
            "level": "3",
            "full_name": "江西省-萍乡市-湘东区"
        },
        {
            "id": "360321",
            "name": "莲花县",
            "parent_id": "360300",
            "level": "3",
            "full_name": "江西省-萍乡市-莲花县"
        },
        {
            "id": "360322",
            "name": "上栗县",
            "parent_id": "360300",
            "level": "3",
            "full_name": "江西省-萍乡市-上栗县"
        },
        {
            "id": "360323",
            "name": "芦溪县",
            "parent_id": "360300",
            "level": "3",
            "full_name": "江西省-萍乡市-芦溪县"
        },
        {
            "id": "360400",
            "name": "九江市",
            "parent_id": "360000",
            "level": "2",
            "full_name": "江西省-九江市"
        },
        {
            "id": "360401",
            "name": "市辖区",
            "parent_id": "360400",
            "level": "3",
            "full_name": "江西省-九江市-市辖区"
        },
        {
            "id": "360402",
            "name": "庐山区",
            "parent_id": "360400",
            "level": "3",
            "full_name": "江西省-九江市-庐山区"
        },
        {
            "id": "360403",
            "name": "浔阳区",
            "parent_id": "360400",
            "level": "3",
            "full_name": "江西省-九江市-浔阳区"
        },
        {
            "id": "360421",
            "name": "九江县",
            "parent_id": "360400",
            "level": "3",
            "full_name": "江西省-九江市-九江县"
        },
        {
            "id": "360423",
            "name": "武宁县",
            "parent_id": "360400",
            "level": "3",
            "full_name": "江西省-九江市-武宁县"
        },
        {
            "id": "360424",
            "name": "修水县",
            "parent_id": "360400",
            "level": "3",
            "full_name": "江西省-九江市-修水县"
        },
        {
            "id": "360425",
            "name": "永修县",
            "parent_id": "360400",
            "level": "3",
            "full_name": "江西省-九江市-永修县"
        },
        {
            "id": "360426",
            "name": "德安县",
            "parent_id": "360400",
            "level": "3",
            "full_name": "江西省-九江市-德安县"
        },
        {
            "id": "360427",
            "name": "星子县",
            "parent_id": "360400",
            "level": "3",
            "full_name": "江西省-九江市-星子县"
        },
        {
            "id": "360428",
            "name": "都昌县",
            "parent_id": "360400",
            "level": "3",
            "full_name": "江西省-九江市-都昌县"
        },
        {
            "id": "360429",
            "name": "湖口县",
            "parent_id": "360400",
            "level": "3",
            "full_name": "江西省-九江市-湖口县"
        },
        {
            "id": "360430",
            "name": "彭泽县",
            "parent_id": "360400",
            "level": "3",
            "full_name": "江西省-九江市-彭泽县"
        },
        {
            "id": "360481",
            "name": "瑞昌市",
            "parent_id": "360400",
            "level": "3",
            "full_name": "江西省-九江市-瑞昌市"
        },
        {
            "id": "360482",
            "name": "共青城市",
            "parent_id": "360400",
            "level": "3",
            "full_name": "江西省-九江市-共青城市"
        },
        {
            "id": "360500",
            "name": "新余市",
            "parent_id": "360000",
            "level": "2",
            "full_name": "江西省-新余市"
        },
        {
            "id": "360501",
            "name": "市辖区",
            "parent_id": "360500",
            "level": "3",
            "full_name": "江西省-新余市-市辖区"
        },
        {
            "id": "360502",
            "name": "渝水区",
            "parent_id": "360500",
            "level": "3",
            "full_name": "江西省-新余市-渝水区"
        },
        {
            "id": "360521",
            "name": "分宜县",
            "parent_id": "360500",
            "level": "3",
            "full_name": "江西省-新余市-分宜县"
        },
        {
            "id": "360600",
            "name": "鹰潭市",
            "parent_id": "360000",
            "level": "2",
            "full_name": "江西省-鹰潭市"
        },
        {
            "id": "360601",
            "name": "市辖区",
            "parent_id": "360600",
            "level": "3",
            "full_name": "江西省-鹰潭市-市辖区"
        },
        {
            "id": "360602",
            "name": "月湖区",
            "parent_id": "360600",
            "level": "3",
            "full_name": "江西省-鹰潭市-月湖区"
        },
        {
            "id": "360622",
            "name": "余江县",
            "parent_id": "360600",
            "level": "3",
            "full_name": "江西省-鹰潭市-余江县"
        },
        {
            "id": "360681",
            "name": "贵溪市",
            "parent_id": "360600",
            "level": "3",
            "full_name": "江西省-鹰潭市-贵溪市"
        },
        {
            "id": "360700",
            "name": "赣州市",
            "parent_id": "360000",
            "level": "2",
            "full_name": "江西省-赣州市"
        },
        {
            "id": "360701",
            "name": "市辖区",
            "parent_id": "360700",
            "level": "3",
            "full_name": "江西省-赣州市-市辖区"
        },
        {
            "id": "360702",
            "name": "章贡区",
            "parent_id": "360700",
            "level": "3",
            "full_name": "江西省-赣州市-章贡区"
        },
        {
            "id": "360703",
            "name": "南康区",
            "parent_id": "360700",
            "level": "3",
            "full_name": "江西省-赣州市-南康区"
        },
        {
            "id": "360721",
            "name": "赣县",
            "parent_id": "360700",
            "level": "3",
            "full_name": "江西省-赣州市-赣县"
        },
        {
            "id": "360722",
            "name": "信丰县",
            "parent_id": "360700",
            "level": "3",
            "full_name": "江西省-赣州市-信丰县"
        },
        {
            "id": "360723",
            "name": "大余县",
            "parent_id": "360700",
            "level": "3",
            "full_name": "江西省-赣州市-大余县"
        },
        {
            "id": "360724",
            "name": "上犹县",
            "parent_id": "360700",
            "level": "3",
            "full_name": "江西省-赣州市-上犹县"
        },
        {
            "id": "360725",
            "name": "崇义县",
            "parent_id": "360700",
            "level": "3",
            "full_name": "江西省-赣州市-崇义县"
        },
        {
            "id": "360726",
            "name": "安远县",
            "parent_id": "360700",
            "level": "3",
            "full_name": "江西省-赣州市-安远县"
        },
        {
            "id": "360727",
            "name": "龙南县",
            "parent_id": "360700",
            "level": "3",
            "full_name": "江西省-赣州市-龙南县"
        },
        {
            "id": "360728",
            "name": "定南县",
            "parent_id": "360700",
            "level": "3",
            "full_name": "江西省-赣州市-定南县"
        },
        {
            "id": "360729",
            "name": "全南县",
            "parent_id": "360700",
            "level": "3",
            "full_name": "江西省-赣州市-全南县"
        },
        {
            "id": "360730",
            "name": "宁都县",
            "parent_id": "360700",
            "level": "3",
            "full_name": "江西省-赣州市-宁都县"
        },
        {
            "id": "360731",
            "name": "于都县",
            "parent_id": "360700",
            "level": "3",
            "full_name": "江西省-赣州市-于都县"
        },
        {
            "id": "360732",
            "name": "兴国县",
            "parent_id": "360700",
            "level": "3",
            "full_name": "江西省-赣州市-兴国县"
        },
        {
            "id": "360733",
            "name": "会昌县",
            "parent_id": "360700",
            "level": "3",
            "full_name": "江西省-赣州市-会昌县"
        },
        {
            "id": "360734",
            "name": "寻乌县",
            "parent_id": "360700",
            "level": "3",
            "full_name": "江西省-赣州市-寻乌县"
        },
        {
            "id": "360735",
            "name": "石城县",
            "parent_id": "360700",
            "level": "3",
            "full_name": "江西省-赣州市-石城县"
        },
        {
            "id": "360781",
            "name": "瑞金市",
            "parent_id": "360700",
            "level": "3",
            "full_name": "江西省-赣州市-瑞金市"
        },
        {
            "id": "360800",
            "name": "吉安市",
            "parent_id": "360000",
            "level": "2",
            "full_name": "江西省-吉安市"
        },
        {
            "id": "360801",
            "name": "市辖区",
            "parent_id": "360800",
            "level": "3",
            "full_name": "江西省-吉安市-市辖区"
        },
        {
            "id": "360802",
            "name": "吉州区",
            "parent_id": "360800",
            "level": "3",
            "full_name": "江西省-吉安市-吉州区"
        },
        {
            "id": "360803",
            "name": "青原区",
            "parent_id": "360800",
            "level": "3",
            "full_name": "江西省-吉安市-青原区"
        },
        {
            "id": "360821",
            "name": "吉安县",
            "parent_id": "360800",
            "level": "3",
            "full_name": "江西省-吉安市-吉安县"
        },
        {
            "id": "360822",
            "name": "吉水县",
            "parent_id": "360800",
            "level": "3",
            "full_name": "江西省-吉安市-吉水县"
        },
        {
            "id": "360823",
            "name": "峡江县",
            "parent_id": "360800",
            "level": "3",
            "full_name": "江西省-吉安市-峡江县"
        },
        {
            "id": "360824",
            "name": "新干县",
            "parent_id": "360800",
            "level": "3",
            "full_name": "江西省-吉安市-新干县"
        },
        {
            "id": "360825",
            "name": "永丰县",
            "parent_id": "360800",
            "level": "3",
            "full_name": "江西省-吉安市-永丰县"
        },
        {
            "id": "360826",
            "name": "泰和县",
            "parent_id": "360800",
            "level": "3",
            "full_name": "江西省-吉安市-泰和县"
        },
        {
            "id": "360827",
            "name": "遂川县",
            "parent_id": "360800",
            "level": "3",
            "full_name": "江西省-吉安市-遂川县"
        },
        {
            "id": "360828",
            "name": "万安县",
            "parent_id": "360800",
            "level": "3",
            "full_name": "江西省-吉安市-万安县"
        },
        {
            "id": "360829",
            "name": "安福县",
            "parent_id": "360800",
            "level": "3",
            "full_name": "江西省-吉安市-安福县"
        },
        {
            "id": "360830",
            "name": "永新县",
            "parent_id": "360800",
            "level": "3",
            "full_name": "江西省-吉安市-永新县"
        },
        {
            "id": "360881",
            "name": "井冈山市",
            "parent_id": "360800",
            "level": "3",
            "full_name": "江西省-吉安市-井冈山市"
        },
        {
            "id": "360900",
            "name": "宜春市",
            "parent_id": "360000",
            "level": "2",
            "full_name": "江西省-宜春市"
        },
        {
            "id": "360901",
            "name": "市辖区",
            "parent_id": "360900",
            "level": "3",
            "full_name": "江西省-宜春市-市辖区"
        },
        {
            "id": "360902",
            "name": "袁州区",
            "parent_id": "360900",
            "level": "3",
            "full_name": "江西省-宜春市-袁州区"
        },
        {
            "id": "360921",
            "name": "奉新县",
            "parent_id": "360900",
            "level": "3",
            "full_name": "江西省-宜春市-奉新县"
        },
        {
            "id": "360922",
            "name": "万载县",
            "parent_id": "360900",
            "level": "3",
            "full_name": "江西省-宜春市-万载县"
        },
        {
            "id": "360923",
            "name": "上高县",
            "parent_id": "360900",
            "level": "3",
            "full_name": "江西省-宜春市-上高县"
        },
        {
            "id": "360924",
            "name": "宜丰县",
            "parent_id": "360900",
            "level": "3",
            "full_name": "江西省-宜春市-宜丰县"
        },
        {
            "id": "360925",
            "name": "靖安县",
            "parent_id": "360900",
            "level": "3",
            "full_name": "江西省-宜春市-靖安县"
        },
        {
            "id": "360926",
            "name": "铜鼓县",
            "parent_id": "360900",
            "level": "3",
            "full_name": "江西省-宜春市-铜鼓县"
        },
        {
            "id": "360981",
            "name": "丰城市",
            "parent_id": "360900",
            "level": "3",
            "full_name": "江西省-宜春市-丰城市"
        },
        {
            "id": "360982",
            "name": "樟树市",
            "parent_id": "360900",
            "level": "3",
            "full_name": "江西省-宜春市-樟树市"
        },
        {
            "id": "360983",
            "name": "高安市",
            "parent_id": "360900",
            "level": "3",
            "full_name": "江西省-宜春市-高安市"
        },
        {
            "id": "361000",
            "name": "抚州市",
            "parent_id": "360000",
            "level": "2",
            "full_name": "江西省-抚州市"
        },
        {
            "id": "361001",
            "name": "市辖区",
            "parent_id": "361000",
            "level": "3",
            "full_name": "江西省-抚州市-市辖区"
        },
        {
            "id": "361002",
            "name": "临川区",
            "parent_id": "361000",
            "level": "3",
            "full_name": "江西省-抚州市-临川区"
        },
        {
            "id": "361021",
            "name": "南城县",
            "parent_id": "361000",
            "level": "3",
            "full_name": "江西省-抚州市-南城县"
        },
        {
            "id": "361022",
            "name": "黎川县",
            "parent_id": "361000",
            "level": "3",
            "full_name": "江西省-抚州市-黎川县"
        },
        {
            "id": "361023",
            "name": "南丰县",
            "parent_id": "361000",
            "level": "3",
            "full_name": "江西省-抚州市-南丰县"
        },
        {
            "id": "361024",
            "name": "崇仁县",
            "parent_id": "361000",
            "level": "3",
            "full_name": "江西省-抚州市-崇仁县"
        },
        {
            "id": "361025",
            "name": "乐安县",
            "parent_id": "361000",
            "level": "3",
            "full_name": "江西省-抚州市-乐安县"
        },
        {
            "id": "361026",
            "name": "宜黄县",
            "parent_id": "361000",
            "level": "3",
            "full_name": "江西省-抚州市-宜黄县"
        },
        {
            "id": "361027",
            "name": "金溪县",
            "parent_id": "361000",
            "level": "3",
            "full_name": "江西省-抚州市-金溪县"
        },
        {
            "id": "361028",
            "name": "资溪县",
            "parent_id": "361000",
            "level": "3",
            "full_name": "江西省-抚州市-资溪县"
        },
        {
            "id": "361029",
            "name": "东乡县",
            "parent_id": "361000",
            "level": "3",
            "full_name": "江西省-抚州市-东乡县"
        },
        {
            "id": "361030",
            "name": "广昌县",
            "parent_id": "361000",
            "level": "3",
            "full_name": "江西省-抚州市-广昌县"
        },
        {
            "id": "361100",
            "name": "上饶市",
            "parent_id": "360000",
            "level": "2",
            "full_name": "江西省-上饶市"
        },
        {
            "id": "361101",
            "name": "市辖区",
            "parent_id": "361100",
            "level": "3",
            "full_name": "江西省-上饶市-市辖区"
        },
        {
            "id": "361102",
            "name": "信州区",
            "parent_id": "361100",
            "level": "3",
            "full_name": "江西省-上饶市-信州区"
        },
        {
            "id": "361103",
            "name": "广丰区",
            "parent_id": "361100",
            "level": "3",
            "full_name": "江西省-上饶市-广丰区"
        },
        {
            "id": "361121",
            "name": "上饶县",
            "parent_id": "361100",
            "level": "3",
            "full_name": "江西省-上饶市-上饶县"
        },
        {
            "id": "361123",
            "name": "玉山县",
            "parent_id": "361100",
            "level": "3",
            "full_name": "江西省-上饶市-玉山县"
        },
        {
            "id": "361124",
            "name": "铅山县",
            "parent_id": "361100",
            "level": "3",
            "full_name": "江西省-上饶市-铅山县"
        },
        {
            "id": "361125",
            "name": "横峰县",
            "parent_id": "361100",
            "level": "3",
            "full_name": "江西省-上饶市-横峰县"
        },
        {
            "id": "361126",
            "name": "弋阳县",
            "parent_id": "361100",
            "level": "3",
            "full_name": "江西省-上饶市-弋阳县"
        },
        {
            "id": "361127",
            "name": "余干县",
            "parent_id": "361100",
            "level": "3",
            "full_name": "江西省-上饶市-余干县"
        },
        {
            "id": "361128",
            "name": "鄱阳县",
            "parent_id": "361100",
            "level": "3",
            "full_name": "江西省-上饶市-鄱阳县"
        },
        {
            "id": "361129",
            "name": "万年县",
            "parent_id": "361100",
            "level": "3",
            "full_name": "江西省-上饶市-万年县"
        },
        {
            "id": "361130",
            "name": "婺源县",
            "parent_id": "361100",
            "level": "3",
            "full_name": "江西省-上饶市-婺源县"
        },
        {
            "id": "361181",
            "name": "德兴市",
            "parent_id": "361100",
            "level": "3",
            "full_name": "江西省-上饶市-德兴市"
        },
        {
            "id": "370000",
            "name": "山东省",
            "parent_id": "0",
            "level": "1",
            "full_name": "山东省"
        },
        {
            "id": "370100",
            "name": "济南市",
            "parent_id": "370000",
            "level": "2",
            "full_name": "山东省-济南市"
        },
        {
            "id": "370101",
            "name": "市辖区",
            "parent_id": "370100",
            "level": "3",
            "full_name": "山东省-济南市-市辖区"
        },
        {
            "id": "370102",
            "name": "历下区",
            "parent_id": "370100",
            "level": "3",
            "full_name": "山东省-济南市-历下区"
        },
        {
            "id": "370103",
            "name": "市中区",
            "parent_id": "370100",
            "level": "3",
            "full_name": "山东省-济南市-市中区"
        },
        {
            "id": "370104",
            "name": "槐荫区",
            "parent_id": "370100",
            "level": "3",
            "full_name": "山东省-济南市-槐荫区"
        },
        {
            "id": "370105",
            "name": "天桥区",
            "parent_id": "370100",
            "level": "3",
            "full_name": "山东省-济南市-天桥区"
        },
        {
            "id": "370112",
            "name": "历城区",
            "parent_id": "370100",
            "level": "3",
            "full_name": "山东省-济南市-历城区"
        },
        {
            "id": "370113",
            "name": "长清区",
            "parent_id": "370100",
            "level": "3",
            "full_name": "山东省-济南市-长清区"
        },
        {
            "id": "370124",
            "name": "平阴县",
            "parent_id": "370100",
            "level": "3",
            "full_name": "山东省-济南市-平阴县"
        },
        {
            "id": "370125",
            "name": "济阳县",
            "parent_id": "370100",
            "level": "3",
            "full_name": "山东省-济南市-济阳县"
        },
        {
            "id": "370126",
            "name": "商河县",
            "parent_id": "370100",
            "level": "3",
            "full_name": "山东省-济南市-商河县"
        },
        {
            "id": "370181",
            "name": "章丘市",
            "parent_id": "370100",
            "level": "3",
            "full_name": "山东省-济南市-章丘市"
        },
        {
            "id": "370200",
            "name": "青岛市",
            "parent_id": "370000",
            "level": "2",
            "full_name": "山东省-青岛市"
        },
        {
            "id": "370201",
            "name": "市辖区",
            "parent_id": "370200",
            "level": "3",
            "full_name": "山东省-青岛市-市辖区"
        },
        {
            "id": "370202",
            "name": "市南区",
            "parent_id": "370200",
            "level": "3",
            "full_name": "山东省-青岛市-市南区"
        },
        {
            "id": "370203",
            "name": "市北区",
            "parent_id": "370200",
            "level": "3",
            "full_name": "山东省-青岛市-市北区"
        },
        {
            "id": "370211",
            "name": "黄岛区",
            "parent_id": "370200",
            "level": "3",
            "full_name": "山东省-青岛市-黄岛区"
        },
        {
            "id": "370212",
            "name": "崂山区",
            "parent_id": "370200",
            "level": "3",
            "full_name": "山东省-青岛市-崂山区"
        },
        {
            "id": "370213",
            "name": "李沧区",
            "parent_id": "370200",
            "level": "3",
            "full_name": "山东省-青岛市-李沧区"
        },
        {
            "id": "370214",
            "name": "城阳区",
            "parent_id": "370200",
            "level": "3",
            "full_name": "山东省-青岛市-城阳区"
        },
        {
            "id": "370281",
            "name": "胶州市",
            "parent_id": "370200",
            "level": "3",
            "full_name": "山东省-青岛市-胶州市"
        },
        {
            "id": "370282",
            "name": "即墨市",
            "parent_id": "370200",
            "level": "3",
            "full_name": "山东省-青岛市-即墨市"
        },
        {
            "id": "370283",
            "name": "平度市",
            "parent_id": "370200",
            "level": "3",
            "full_name": "山东省-青岛市-平度市"
        },
        {
            "id": "370285",
            "name": "莱西市",
            "parent_id": "370200",
            "level": "3",
            "full_name": "山东省-青岛市-莱西市"
        },
        {
            "id": "370300",
            "name": "淄博市",
            "parent_id": "370000",
            "level": "2",
            "full_name": "山东省-淄博市"
        },
        {
            "id": "370301",
            "name": "市辖区",
            "parent_id": "370300",
            "level": "3",
            "full_name": "山东省-淄博市-市辖区"
        },
        {
            "id": "370302",
            "name": "淄川区",
            "parent_id": "370300",
            "level": "3",
            "full_name": "山东省-淄博市-淄川区"
        },
        {
            "id": "370303",
            "name": "张店区",
            "parent_id": "370300",
            "level": "3",
            "full_name": "山东省-淄博市-张店区"
        },
        {
            "id": "370304",
            "name": "博山区",
            "parent_id": "370300",
            "level": "3",
            "full_name": "山东省-淄博市-博山区"
        },
        {
            "id": "370305",
            "name": "临淄区",
            "parent_id": "370300",
            "level": "3",
            "full_name": "山东省-淄博市-临淄区"
        },
        {
            "id": "370306",
            "name": "周村区",
            "parent_id": "370300",
            "level": "3",
            "full_name": "山东省-淄博市-周村区"
        },
        {
            "id": "370321",
            "name": "桓台县",
            "parent_id": "370300",
            "level": "3",
            "full_name": "山东省-淄博市-桓台县"
        },
        {
            "id": "370322",
            "name": "高青县",
            "parent_id": "370300",
            "level": "3",
            "full_name": "山东省-淄博市-高青县"
        },
        {
            "id": "370323",
            "name": "沂源县",
            "parent_id": "370300",
            "level": "3",
            "full_name": "山东省-淄博市-沂源县"
        },
        {
            "id": "370400",
            "name": "枣庄市",
            "parent_id": "370000",
            "level": "2",
            "full_name": "山东省-枣庄市"
        },
        {
            "id": "370401",
            "name": "市辖区",
            "parent_id": "370400",
            "level": "3",
            "full_name": "山东省-枣庄市-市辖区"
        },
        {
            "id": "370402",
            "name": "市中区",
            "parent_id": "370400",
            "level": "3",
            "full_name": "山东省-枣庄市-市中区"
        },
        {
            "id": "370403",
            "name": "薛城区",
            "parent_id": "370400",
            "level": "3",
            "full_name": "山东省-枣庄市-薛城区"
        },
        {
            "id": "370404",
            "name": "峄城区",
            "parent_id": "370400",
            "level": "3",
            "full_name": "山东省-枣庄市-峄城区"
        },
        {
            "id": "370405",
            "name": "台儿庄区",
            "parent_id": "370400",
            "level": "3",
            "full_name": "山东省-枣庄市-台儿庄区"
        },
        {
            "id": "370406",
            "name": "山亭区",
            "parent_id": "370400",
            "level": "3",
            "full_name": "山东省-枣庄市-山亭区"
        },
        {
            "id": "370481",
            "name": "滕州市",
            "parent_id": "370400",
            "level": "3",
            "full_name": "山东省-枣庄市-滕州市"
        },
        {
            "id": "370500",
            "name": "东营市",
            "parent_id": "370000",
            "level": "2",
            "full_name": "山东省-东营市"
        },
        {
            "id": "370501",
            "name": "市辖区",
            "parent_id": "370500",
            "level": "3",
            "full_name": "山东省-东营市-市辖区"
        },
        {
            "id": "370502",
            "name": "东营区",
            "parent_id": "370500",
            "level": "3",
            "full_name": "山东省-东营市-东营区"
        },
        {
            "id": "370503",
            "name": "河口区",
            "parent_id": "370500",
            "level": "3",
            "full_name": "山东省-东营市-河口区"
        },
        {
            "id": "370521",
            "name": "垦利县",
            "parent_id": "370500",
            "level": "3",
            "full_name": "山东省-东营市-垦利县"
        },
        {
            "id": "370522",
            "name": "利津县",
            "parent_id": "370500",
            "level": "3",
            "full_name": "山东省-东营市-利津县"
        },
        {
            "id": "370523",
            "name": "广饶县",
            "parent_id": "370500",
            "level": "3",
            "full_name": "山东省-东营市-广饶县"
        },
        {
            "id": "370600",
            "name": "烟台市",
            "parent_id": "370000",
            "level": "2",
            "full_name": "山东省-烟台市"
        },
        {
            "id": "370601",
            "name": "市辖区",
            "parent_id": "370600",
            "level": "3",
            "full_name": "山东省-烟台市-市辖区"
        },
        {
            "id": "370602",
            "name": "芝罘区",
            "parent_id": "370600",
            "level": "3",
            "full_name": "山东省-烟台市-芝罘区"
        },
        {
            "id": "370611",
            "name": "福山区",
            "parent_id": "370600",
            "level": "3",
            "full_name": "山东省-烟台市-福山区"
        },
        {
            "id": "370612",
            "name": "牟平区",
            "parent_id": "370600",
            "level": "3",
            "full_name": "山东省-烟台市-牟平区"
        },
        {
            "id": "370613",
            "name": "莱山区",
            "parent_id": "370600",
            "level": "3",
            "full_name": "山东省-烟台市-莱山区"
        },
        {
            "id": "370634",
            "name": "长岛县",
            "parent_id": "370600",
            "level": "3",
            "full_name": "山东省-烟台市-长岛县"
        },
        {
            "id": "370681",
            "name": "龙口市",
            "parent_id": "370600",
            "level": "3",
            "full_name": "山东省-烟台市-龙口市"
        },
        {
            "id": "370682",
            "name": "莱阳市",
            "parent_id": "370600",
            "level": "3",
            "full_name": "山东省-烟台市-莱阳市"
        },
        {
            "id": "370683",
            "name": "莱州市",
            "parent_id": "370600",
            "level": "3",
            "full_name": "山东省-烟台市-莱州市"
        },
        {
            "id": "370684",
            "name": "蓬莱市",
            "parent_id": "370600",
            "level": "3",
            "full_name": "山东省-烟台市-蓬莱市"
        },
        {
            "id": "370685",
            "name": "招远市",
            "parent_id": "370600",
            "level": "3",
            "full_name": "山东省-烟台市-招远市"
        },
        {
            "id": "370686",
            "name": "栖霞市",
            "parent_id": "370600",
            "level": "3",
            "full_name": "山东省-烟台市-栖霞市"
        },
        {
            "id": "370687",
            "name": "海阳市",
            "parent_id": "370600",
            "level": "3",
            "full_name": "山东省-烟台市-海阳市"
        },
        {
            "id": "370700",
            "name": "潍坊市",
            "parent_id": "370000",
            "level": "2",
            "full_name": "山东省-潍坊市"
        },
        {
            "id": "370701",
            "name": "市辖区",
            "parent_id": "370700",
            "level": "3",
            "full_name": "山东省-潍坊市-市辖区"
        },
        {
            "id": "370702",
            "name": "潍城区",
            "parent_id": "370700",
            "level": "3",
            "full_name": "山东省-潍坊市-潍城区"
        },
        {
            "id": "370703",
            "name": "寒亭区",
            "parent_id": "370700",
            "level": "3",
            "full_name": "山东省-潍坊市-寒亭区"
        },
        {
            "id": "370704",
            "name": "坊子区",
            "parent_id": "370700",
            "level": "3",
            "full_name": "山东省-潍坊市-坊子区"
        },
        {
            "id": "370705",
            "name": "奎文区",
            "parent_id": "370700",
            "level": "3",
            "full_name": "山东省-潍坊市-奎文区"
        },
        {
            "id": "370724",
            "name": "临朐县",
            "parent_id": "370700",
            "level": "3",
            "full_name": "山东省-潍坊市-临朐县"
        },
        {
            "id": "370725",
            "name": "昌乐县",
            "parent_id": "370700",
            "level": "3",
            "full_name": "山东省-潍坊市-昌乐县"
        },
        {
            "id": "370781",
            "name": "青州市",
            "parent_id": "370700",
            "level": "3",
            "full_name": "山东省-潍坊市-青州市"
        },
        {
            "id": "370782",
            "name": "诸城市",
            "parent_id": "370700",
            "level": "3",
            "full_name": "山东省-潍坊市-诸城市"
        },
        {
            "id": "370783",
            "name": "寿光市",
            "parent_id": "370700",
            "level": "3",
            "full_name": "山东省-潍坊市-寿光市"
        },
        {
            "id": "370784",
            "name": "安丘市",
            "parent_id": "370700",
            "level": "3",
            "full_name": "山东省-潍坊市-安丘市"
        },
        {
            "id": "370785",
            "name": "高密市",
            "parent_id": "370700",
            "level": "3",
            "full_name": "山东省-潍坊市-高密市"
        },
        {
            "id": "370786",
            "name": "昌邑市",
            "parent_id": "370700",
            "level": "3",
            "full_name": "山东省-潍坊市-昌邑市"
        },
        {
            "id": "370800",
            "name": "济宁市",
            "parent_id": "370000",
            "level": "2",
            "full_name": "山东省-济宁市"
        },
        {
            "id": "370801",
            "name": "市辖区",
            "parent_id": "370800",
            "level": "3",
            "full_name": "山东省-济宁市-市辖区"
        },
        {
            "id": "370811",
            "name": "任城区",
            "parent_id": "370800",
            "level": "3",
            "full_name": "山东省-济宁市-任城区"
        },
        {
            "id": "370812",
            "name": "兖州区",
            "parent_id": "370800",
            "level": "3",
            "full_name": "山东省-济宁市-兖州区"
        },
        {
            "id": "370826",
            "name": "微山县",
            "parent_id": "370800",
            "level": "3",
            "full_name": "山东省-济宁市-微山县"
        },
        {
            "id": "370827",
            "name": "鱼台县",
            "parent_id": "370800",
            "level": "3",
            "full_name": "山东省-济宁市-鱼台县"
        },
        {
            "id": "370828",
            "name": "金乡县",
            "parent_id": "370800",
            "level": "3",
            "full_name": "山东省-济宁市-金乡县"
        },
        {
            "id": "370829",
            "name": "嘉祥县",
            "parent_id": "370800",
            "level": "3",
            "full_name": "山东省-济宁市-嘉祥县"
        },
        {
            "id": "370830",
            "name": "汶上县",
            "parent_id": "370800",
            "level": "3",
            "full_name": "山东省-济宁市-汶上县"
        },
        {
            "id": "370831",
            "name": "泗水县",
            "parent_id": "370800",
            "level": "3",
            "full_name": "山东省-济宁市-泗水县"
        },
        {
            "id": "370832",
            "name": "梁山县",
            "parent_id": "370800",
            "level": "3",
            "full_name": "山东省-济宁市-梁山县"
        },
        {
            "id": "370881",
            "name": "曲阜市",
            "parent_id": "370800",
            "level": "3",
            "full_name": "山东省-济宁市-曲阜市"
        },
        {
            "id": "370883",
            "name": "邹城市",
            "parent_id": "370800",
            "level": "3",
            "full_name": "山东省-济宁市-邹城市"
        },
        {
            "id": "370900",
            "name": "泰安市",
            "parent_id": "370000",
            "level": "2",
            "full_name": "山东省-泰安市"
        },
        {
            "id": "370901",
            "name": "市辖区",
            "parent_id": "370900",
            "level": "3",
            "full_name": "山东省-泰安市-市辖区"
        },
        {
            "id": "370902",
            "name": "泰山区",
            "parent_id": "370900",
            "level": "3",
            "full_name": "山东省-泰安市-泰山区"
        },
        {
            "id": "370911",
            "name": "岱岳区",
            "parent_id": "370900",
            "level": "3",
            "full_name": "山东省-泰安市-岱岳区"
        },
        {
            "id": "370921",
            "name": "宁阳县",
            "parent_id": "370900",
            "level": "3",
            "full_name": "山东省-泰安市-宁阳县"
        },
        {
            "id": "370923",
            "name": "东平县",
            "parent_id": "370900",
            "level": "3",
            "full_name": "山东省-泰安市-东平县"
        },
        {
            "id": "370982",
            "name": "新泰市",
            "parent_id": "370900",
            "level": "3",
            "full_name": "山东省-泰安市-新泰市"
        },
        {
            "id": "370983",
            "name": "肥城市",
            "parent_id": "370900",
            "level": "3",
            "full_name": "山东省-泰安市-肥城市"
        },
        {
            "id": "371000",
            "name": "威海市",
            "parent_id": "370000",
            "level": "2",
            "full_name": "山东省-威海市"
        },
        {
            "id": "371001",
            "name": "市辖区",
            "parent_id": "371000",
            "level": "3",
            "full_name": "山东省-威海市-市辖区"
        },
        {
            "id": "371002",
            "name": "环翠区",
            "parent_id": "371000",
            "level": "3",
            "full_name": "山东省-威海市-环翠区"
        },
        {
            "id": "371003",
            "name": "文登区",
            "parent_id": "371000",
            "level": "3",
            "full_name": "山东省-威海市-文登区"
        },
        {
            "id": "371082",
            "name": "荣成市",
            "parent_id": "371000",
            "level": "3",
            "full_name": "山东省-威海市-荣成市"
        },
        {
            "id": "371083",
            "name": "乳山市",
            "parent_id": "371000",
            "level": "3",
            "full_name": "山东省-威海市-乳山市"
        },
        {
            "id": "371100",
            "name": "日照市",
            "parent_id": "370000",
            "level": "2",
            "full_name": "山东省-日照市"
        },
        {
            "id": "371101",
            "name": "市辖区",
            "parent_id": "371100",
            "level": "3",
            "full_name": "山东省-日照市-市辖区"
        },
        {
            "id": "371102",
            "name": "东港区",
            "parent_id": "371100",
            "level": "3",
            "full_name": "山东省-日照市-东港区"
        },
        {
            "id": "371103",
            "name": "岚山区",
            "parent_id": "371100",
            "level": "3",
            "full_name": "山东省-日照市-岚山区"
        },
        {
            "id": "371121",
            "name": "五莲县",
            "parent_id": "371100",
            "level": "3",
            "full_name": "山东省-日照市-五莲县"
        },
        {
            "id": "371122",
            "name": "莒县",
            "parent_id": "371100",
            "level": "3",
            "full_name": "山东省-日照市-莒县"
        },
        {
            "id": "371200",
            "name": "莱芜市",
            "parent_id": "370000",
            "level": "2",
            "full_name": "山东省-莱芜市"
        },
        {
            "id": "371201",
            "name": "市辖区",
            "parent_id": "371200",
            "level": "3",
            "full_name": "山东省-莱芜市-市辖区"
        },
        {
            "id": "371202",
            "name": "莱城区",
            "parent_id": "371200",
            "level": "3",
            "full_name": "山东省-莱芜市-莱城区"
        },
        {
            "id": "371203",
            "name": "钢城区",
            "parent_id": "371200",
            "level": "3",
            "full_name": "山东省-莱芜市-钢城区"
        },
        {
            "id": "371300",
            "name": "临沂市",
            "parent_id": "370000",
            "level": "2",
            "full_name": "山东省-临沂市"
        },
        {
            "id": "371301",
            "name": "市辖区",
            "parent_id": "371300",
            "level": "3",
            "full_name": "山东省-临沂市-市辖区"
        },
        {
            "id": "371302",
            "name": "兰山区",
            "parent_id": "371300",
            "level": "3",
            "full_name": "山东省-临沂市-兰山区"
        },
        {
            "id": "371311",
            "name": "罗庄区",
            "parent_id": "371300",
            "level": "3",
            "full_name": "山东省-临沂市-罗庄区"
        },
        {
            "id": "371312",
            "name": "河东区",
            "parent_id": "371300",
            "level": "3",
            "full_name": "山东省-临沂市-河东区"
        },
        {
            "id": "371321",
            "name": "沂南县",
            "parent_id": "371300",
            "level": "3",
            "full_name": "山东省-临沂市-沂南县"
        },
        {
            "id": "371322",
            "name": "郯城县",
            "parent_id": "371300",
            "level": "3",
            "full_name": "山东省-临沂市-郯城县"
        },
        {
            "id": "371323",
            "name": "沂水县",
            "parent_id": "371300",
            "level": "3",
            "full_name": "山东省-临沂市-沂水县"
        },
        {
            "id": "371324",
            "name": "兰陵县",
            "parent_id": "371300",
            "level": "3",
            "full_name": "山东省-临沂市-兰陵县"
        },
        {
            "id": "371325",
            "name": "费县",
            "parent_id": "371300",
            "level": "3",
            "full_name": "山东省-临沂市-费县"
        },
        {
            "id": "371326",
            "name": "平邑县",
            "parent_id": "371300",
            "level": "3",
            "full_name": "山东省-临沂市-平邑县"
        },
        {
            "id": "371327",
            "name": "莒南县",
            "parent_id": "371300",
            "level": "3",
            "full_name": "山东省-临沂市-莒南县"
        },
        {
            "id": "371328",
            "name": "蒙阴县",
            "parent_id": "371300",
            "level": "3",
            "full_name": "山东省-临沂市-蒙阴县"
        },
        {
            "id": "371329",
            "name": "临沭县",
            "parent_id": "371300",
            "level": "3",
            "full_name": "山东省-临沂市-临沭县"
        },
        {
            "id": "371400",
            "name": "德州市",
            "parent_id": "370000",
            "level": "2",
            "full_name": "山东省-德州市"
        },
        {
            "id": "371401",
            "name": "市辖区",
            "parent_id": "371400",
            "level": "3",
            "full_name": "山东省-德州市-市辖区"
        },
        {
            "id": "371402",
            "name": "德城区",
            "parent_id": "371400",
            "level": "3",
            "full_name": "山东省-德州市-德城区"
        },
        {
            "id": "371403",
            "name": "陵城区",
            "parent_id": "371400",
            "level": "3",
            "full_name": "山东省-德州市-陵城区"
        },
        {
            "id": "371422",
            "name": "宁津县",
            "parent_id": "371400",
            "level": "3",
            "full_name": "山东省-德州市-宁津县"
        },
        {
            "id": "371423",
            "name": "庆云县",
            "parent_id": "371400",
            "level": "3",
            "full_name": "山东省-德州市-庆云县"
        },
        {
            "id": "371424",
            "name": "临邑县",
            "parent_id": "371400",
            "level": "3",
            "full_name": "山东省-德州市-临邑县"
        },
        {
            "id": "371425",
            "name": "齐河县",
            "parent_id": "371400",
            "level": "3",
            "full_name": "山东省-德州市-齐河县"
        },
        {
            "id": "371426",
            "name": "平原县",
            "parent_id": "371400",
            "level": "3",
            "full_name": "山东省-德州市-平原县"
        },
        {
            "id": "371427",
            "name": "夏津县",
            "parent_id": "371400",
            "level": "3",
            "full_name": "山东省-德州市-夏津县"
        },
        {
            "id": "371428",
            "name": "武城县",
            "parent_id": "371400",
            "level": "3",
            "full_name": "山东省-德州市-武城县"
        },
        {
            "id": "371481",
            "name": "乐陵市",
            "parent_id": "371400",
            "level": "3",
            "full_name": "山东省-德州市-乐陵市"
        },
        {
            "id": "371482",
            "name": "禹城市",
            "parent_id": "371400",
            "level": "3",
            "full_name": "山东省-德州市-禹城市"
        },
        {
            "id": "371500",
            "name": "聊城市",
            "parent_id": "370000",
            "level": "2",
            "full_name": "山东省-聊城市"
        },
        {
            "id": "371501",
            "name": "市辖区",
            "parent_id": "371500",
            "level": "3",
            "full_name": "山东省-聊城市-市辖区"
        },
        {
            "id": "371502",
            "name": "东昌府区",
            "parent_id": "371500",
            "level": "3",
            "full_name": "山东省-聊城市-东昌府区"
        },
        {
            "id": "371521",
            "name": "阳谷县",
            "parent_id": "371500",
            "level": "3",
            "full_name": "山东省-聊城市-阳谷县"
        },
        {
            "id": "371522",
            "name": "莘县",
            "parent_id": "371500",
            "level": "3",
            "full_name": "山东省-聊城市-莘县"
        },
        {
            "id": "371523",
            "name": "茌平县",
            "parent_id": "371500",
            "level": "3",
            "full_name": "山东省-聊城市-茌平县"
        },
        {
            "id": "371524",
            "name": "东阿县",
            "parent_id": "371500",
            "level": "3",
            "full_name": "山东省-聊城市-东阿县"
        },
        {
            "id": "371525",
            "name": "冠县",
            "parent_id": "371500",
            "level": "3",
            "full_name": "山东省-聊城市-冠县"
        },
        {
            "id": "371526",
            "name": "高唐县",
            "parent_id": "371500",
            "level": "3",
            "full_name": "山东省-聊城市-高唐县"
        },
        {
            "id": "371581",
            "name": "临清市",
            "parent_id": "371500",
            "level": "3",
            "full_name": "山东省-聊城市-临清市"
        },
        {
            "id": "371600",
            "name": "滨州市",
            "parent_id": "370000",
            "level": "2",
            "full_name": "山东省-滨州市"
        },
        {
            "id": "371601",
            "name": "市辖区",
            "parent_id": "371600",
            "level": "3",
            "full_name": "山东省-滨州市-市辖区"
        },
        {
            "id": "371602",
            "name": "滨城区",
            "parent_id": "371600",
            "level": "3",
            "full_name": "山东省-滨州市-滨城区"
        },
        {
            "id": "371603",
            "name": "沾化区",
            "parent_id": "371600",
            "level": "3",
            "full_name": "山东省-滨州市-沾化区"
        },
        {
            "id": "371621",
            "name": "惠民县",
            "parent_id": "371600",
            "level": "3",
            "full_name": "山东省-滨州市-惠民县"
        },
        {
            "id": "371622",
            "name": "阳信县",
            "parent_id": "371600",
            "level": "3",
            "full_name": "山东省-滨州市-阳信县"
        },
        {
            "id": "371623",
            "name": "无棣县",
            "parent_id": "371600",
            "level": "3",
            "full_name": "山东省-滨州市-无棣县"
        },
        {
            "id": "371625",
            "name": "博兴县",
            "parent_id": "371600",
            "level": "3",
            "full_name": "山东省-滨州市-博兴县"
        },
        {
            "id": "371626",
            "name": "邹平县",
            "parent_id": "371600",
            "level": "3",
            "full_name": "山东省-滨州市-邹平县"
        },
        {
            "id": "371700",
            "name": "菏泽市",
            "parent_id": "370000",
            "level": "2",
            "full_name": "山东省-菏泽市"
        },
        {
            "id": "371701",
            "name": "市辖区",
            "parent_id": "371700",
            "level": "3",
            "full_name": "山东省-菏泽市-市辖区"
        },
        {
            "id": "371702",
            "name": "牡丹区",
            "parent_id": "371700",
            "level": "3",
            "full_name": "山东省-菏泽市-牡丹区"
        },
        {
            "id": "371721",
            "name": "曹县",
            "parent_id": "371700",
            "level": "3",
            "full_name": "山东省-菏泽市-曹县"
        },
        {
            "id": "371722",
            "name": "单县",
            "parent_id": "371700",
            "level": "3",
            "full_name": "山东省-菏泽市-单县"
        },
        {
            "id": "371723",
            "name": "成武县",
            "parent_id": "371700",
            "level": "3",
            "full_name": "山东省-菏泽市-成武县"
        },
        {
            "id": "371724",
            "name": "巨野县",
            "parent_id": "371700",
            "level": "3",
            "full_name": "山东省-菏泽市-巨野县"
        },
        {
            "id": "371725",
            "name": "郓城县",
            "parent_id": "371700",
            "level": "3",
            "full_name": "山东省-菏泽市-郓城县"
        },
        {
            "id": "371726",
            "name": "鄄城县",
            "parent_id": "371700",
            "level": "3",
            "full_name": "山东省-菏泽市-鄄城县"
        },
        {
            "id": "371727",
            "name": "定陶县",
            "parent_id": "371700",
            "level": "3",
            "full_name": "山东省-菏泽市-定陶县"
        },
        {
            "id": "371728",
            "name": "东明县",
            "parent_id": "371700",
            "level": "3",
            "full_name": "山东省-菏泽市-东明县"
        },
        {
            "id": "410000",
            "name": "河南省",
            "parent_id": "0",
            "level": "1",
            "full_name": "河南省"
        },
        {
            "id": "410100",
            "name": "郑州市",
            "parent_id": "410000",
            "level": "2",
            "full_name": "河南省-郑州市"
        },
        {
            "id": "410101",
            "name": "市辖区",
            "parent_id": "410100",
            "level": "3",
            "full_name": "河南省-郑州市-市辖区"
        },
        {
            "id": "410102",
            "name": "中原区",
            "parent_id": "410100",
            "level": "3",
            "full_name": "河南省-郑州市-中原区"
        },
        {
            "id": "410103",
            "name": "二七区",
            "parent_id": "410100",
            "level": "3",
            "full_name": "河南省-郑州市-二七区"
        },
        {
            "id": "410104",
            "name": "管城回族区",
            "parent_id": "410100",
            "level": "3",
            "full_name": "河南省-郑州市-管城回族区"
        },
        {
            "id": "410105",
            "name": "金水区",
            "parent_id": "410100",
            "level": "3",
            "full_name": "河南省-郑州市-金水区"
        },
        {
            "id": "410106",
            "name": "上街区",
            "parent_id": "410100",
            "level": "3",
            "full_name": "河南省-郑州市-上街区"
        },
        {
            "id": "410108",
            "name": "惠济区",
            "parent_id": "410100",
            "level": "3",
            "full_name": "河南省-郑州市-惠济区"
        },
        {
            "id": "410122",
            "name": "中牟县",
            "parent_id": "410100",
            "level": "3",
            "full_name": "河南省-郑州市-中牟县"
        },
        {
            "id": "410181",
            "name": "巩义市",
            "parent_id": "410100",
            "level": "3",
            "full_name": "河南省-郑州市-巩义市"
        },
        {
            "id": "410182",
            "name": "荥阳市",
            "parent_id": "410100",
            "level": "3",
            "full_name": "河南省-郑州市-荥阳市"
        },
        {
            "id": "410183",
            "name": "新密市",
            "parent_id": "410100",
            "level": "3",
            "full_name": "河南省-郑州市-新密市"
        },
        {
            "id": "410184",
            "name": "新郑市",
            "parent_id": "410100",
            "level": "3",
            "full_name": "河南省-郑州市-新郑市"
        },
        {
            "id": "410185",
            "name": "登封市",
            "parent_id": "410100",
            "level": "3",
            "full_name": "河南省-郑州市-登封市"
        },
        {
            "id": "410200",
            "name": "开封市",
            "parent_id": "410000",
            "level": "2",
            "full_name": "河南省-开封市"
        },
        {
            "id": "410201",
            "name": "市辖区",
            "parent_id": "410200",
            "level": "3",
            "full_name": "河南省-开封市-市辖区"
        },
        {
            "id": "410202",
            "name": "龙亭区",
            "parent_id": "410200",
            "level": "3",
            "full_name": "河南省-开封市-龙亭区"
        },
        {
            "id": "410203",
            "name": "顺河回族区",
            "parent_id": "410200",
            "level": "3",
            "full_name": "河南省-开封市-顺河回族区"
        },
        {
            "id": "410204",
            "name": "鼓楼区",
            "parent_id": "410200",
            "level": "3",
            "full_name": "河南省-开封市-鼓楼区"
        },
        {
            "id": "410205",
            "name": "禹王台区",
            "parent_id": "410200",
            "level": "3",
            "full_name": "河南省-开封市-禹王台区"
        },
        {
            "id": "410211",
            "name": "金明区",
            "parent_id": "410200",
            "level": "3",
            "full_name": "河南省-开封市-金明区"
        },
        {
            "id": "410212",
            "name": "祥符区",
            "parent_id": "410200",
            "level": "3",
            "full_name": "河南省-开封市-祥符区"
        },
        {
            "id": "410221",
            "name": "杞县",
            "parent_id": "410200",
            "level": "3",
            "full_name": "河南省-开封市-杞县"
        },
        {
            "id": "410222",
            "name": "通许县",
            "parent_id": "410200",
            "level": "3",
            "full_name": "河南省-开封市-通许县"
        },
        {
            "id": "410223",
            "name": "尉氏县",
            "parent_id": "410200",
            "level": "3",
            "full_name": "河南省-开封市-尉氏县"
        },
        {
            "id": "410225",
            "name": "兰考县",
            "parent_id": "410200",
            "level": "3",
            "full_name": "河南省-开封市-兰考县"
        },
        {
            "id": "410300",
            "name": "洛阳市",
            "parent_id": "410000",
            "level": "2",
            "full_name": "河南省-洛阳市"
        },
        {
            "id": "410301",
            "name": "市辖区",
            "parent_id": "410300",
            "level": "3",
            "full_name": "河南省-洛阳市-市辖区"
        },
        {
            "id": "410302",
            "name": "老城区",
            "parent_id": "410300",
            "level": "3",
            "full_name": "河南省-洛阳市-老城区"
        },
        {
            "id": "410303",
            "name": "西工区",
            "parent_id": "410300",
            "level": "3",
            "full_name": "河南省-洛阳市-西工区"
        },
        {
            "id": "410304",
            "name": "瀍河回族区",
            "parent_id": "410300",
            "level": "3",
            "full_name": "河南省-洛阳市-瀍河回族区"
        },
        {
            "id": "410305",
            "name": "涧西区",
            "parent_id": "410300",
            "level": "3",
            "full_name": "河南省-洛阳市-涧西区"
        },
        {
            "id": "410306",
            "name": "吉利区",
            "parent_id": "410300",
            "level": "3",
            "full_name": "河南省-洛阳市-吉利区"
        },
        {
            "id": "410311",
            "name": "洛龙区",
            "parent_id": "410300",
            "level": "3",
            "full_name": "河南省-洛阳市-洛龙区"
        },
        {
            "id": "410322",
            "name": "孟津县",
            "parent_id": "410300",
            "level": "3",
            "full_name": "河南省-洛阳市-孟津县"
        },
        {
            "id": "410323",
            "name": "新安县",
            "parent_id": "410300",
            "level": "3",
            "full_name": "河南省-洛阳市-新安县"
        },
        {
            "id": "410324",
            "name": "栾川县",
            "parent_id": "410300",
            "level": "3",
            "full_name": "河南省-洛阳市-栾川县"
        },
        {
            "id": "410325",
            "name": "嵩县",
            "parent_id": "410300",
            "level": "3",
            "full_name": "河南省-洛阳市-嵩县"
        },
        {
            "id": "410326",
            "name": "汝阳县",
            "parent_id": "410300",
            "level": "3",
            "full_name": "河南省-洛阳市-汝阳县"
        },
        {
            "id": "410327",
            "name": "宜阳县",
            "parent_id": "410300",
            "level": "3",
            "full_name": "河南省-洛阳市-宜阳县"
        },
        {
            "id": "410328",
            "name": "洛宁县",
            "parent_id": "410300",
            "level": "3",
            "full_name": "河南省-洛阳市-洛宁县"
        },
        {
            "id": "410329",
            "name": "伊川县",
            "parent_id": "410300",
            "level": "3",
            "full_name": "河南省-洛阳市-伊川县"
        },
        {
            "id": "410381",
            "name": "偃师市",
            "parent_id": "410300",
            "level": "3",
            "full_name": "河南省-洛阳市-偃师市"
        },
        {
            "id": "410400",
            "name": "平顶山市",
            "parent_id": "410000",
            "level": "2",
            "full_name": "河南省-平顶山市"
        },
        {
            "id": "410401",
            "name": "市辖区",
            "parent_id": "410400",
            "level": "3",
            "full_name": "河南省-平顶山市-市辖区"
        },
        {
            "id": "410402",
            "name": "新华区",
            "parent_id": "410400",
            "level": "3",
            "full_name": "河南省-平顶山市-新华区"
        },
        {
            "id": "410403",
            "name": "卫东区",
            "parent_id": "410400",
            "level": "3",
            "full_name": "河南省-平顶山市-卫东区"
        },
        {
            "id": "410404",
            "name": "石龙区",
            "parent_id": "410400",
            "level": "3",
            "full_name": "河南省-平顶山市-石龙区"
        },
        {
            "id": "410411",
            "name": "湛河区",
            "parent_id": "410400",
            "level": "3",
            "full_name": "河南省-平顶山市-湛河区"
        },
        {
            "id": "410421",
            "name": "宝丰县",
            "parent_id": "410400",
            "level": "3",
            "full_name": "河南省-平顶山市-宝丰县"
        },
        {
            "id": "410422",
            "name": "叶县",
            "parent_id": "410400",
            "level": "3",
            "full_name": "河南省-平顶山市-叶县"
        },
        {
            "id": "410423",
            "name": "鲁山县",
            "parent_id": "410400",
            "level": "3",
            "full_name": "河南省-平顶山市-鲁山县"
        },
        {
            "id": "410425",
            "name": "郏县",
            "parent_id": "410400",
            "level": "3",
            "full_name": "河南省-平顶山市-郏县"
        },
        {
            "id": "410481",
            "name": "舞钢市",
            "parent_id": "410400",
            "level": "3",
            "full_name": "河南省-平顶山市-舞钢市"
        },
        {
            "id": "410482",
            "name": "汝州市",
            "parent_id": "410400",
            "level": "3",
            "full_name": "河南省-平顶山市-汝州市"
        },
        {
            "id": "410500",
            "name": "安阳市",
            "parent_id": "410000",
            "level": "2",
            "full_name": "河南省-安阳市"
        },
        {
            "id": "410501",
            "name": "市辖区",
            "parent_id": "410500",
            "level": "3",
            "full_name": "河南省-安阳市-市辖区"
        },
        {
            "id": "410502",
            "name": "文峰区",
            "parent_id": "410500",
            "level": "3",
            "full_name": "河南省-安阳市-文峰区"
        },
        {
            "id": "410503",
            "name": "北关区",
            "parent_id": "410500",
            "level": "3",
            "full_name": "河南省-安阳市-北关区"
        },
        {
            "id": "410505",
            "name": "殷都区",
            "parent_id": "410500",
            "level": "3",
            "full_name": "河南省-安阳市-殷都区"
        },
        {
            "id": "410506",
            "name": "龙安区",
            "parent_id": "410500",
            "level": "3",
            "full_name": "河南省-安阳市-龙安区"
        },
        {
            "id": "410522",
            "name": "安阳县",
            "parent_id": "410500",
            "level": "3",
            "full_name": "河南省-安阳市-安阳县"
        },
        {
            "id": "410523",
            "name": "汤阴县",
            "parent_id": "410500",
            "level": "3",
            "full_name": "河南省-安阳市-汤阴县"
        },
        {
            "id": "410526",
            "name": "滑县",
            "parent_id": "410500",
            "level": "3",
            "full_name": "河南省-安阳市-滑县"
        },
        {
            "id": "410527",
            "name": "内黄县",
            "parent_id": "410500",
            "level": "3",
            "full_name": "河南省-安阳市-内黄县"
        },
        {
            "id": "410581",
            "name": "林州市",
            "parent_id": "410500",
            "level": "3",
            "full_name": "河南省-安阳市-林州市"
        },
        {
            "id": "410600",
            "name": "鹤壁市",
            "parent_id": "410000",
            "level": "2",
            "full_name": "河南省-鹤壁市"
        },
        {
            "id": "410601",
            "name": "市辖区",
            "parent_id": "410600",
            "level": "3",
            "full_name": "河南省-鹤壁市-市辖区"
        },
        {
            "id": "410602",
            "name": "鹤山区",
            "parent_id": "410600",
            "level": "3",
            "full_name": "河南省-鹤壁市-鹤山区"
        },
        {
            "id": "410603",
            "name": "山城区",
            "parent_id": "410600",
            "level": "3",
            "full_name": "河南省-鹤壁市-山城区"
        },
        {
            "id": "410611",
            "name": "淇滨区",
            "parent_id": "410600",
            "level": "3",
            "full_name": "河南省-鹤壁市-淇滨区"
        },
        {
            "id": "410621",
            "name": "浚县",
            "parent_id": "410600",
            "level": "3",
            "full_name": "河南省-鹤壁市-浚县"
        },
        {
            "id": "410622",
            "name": "淇县",
            "parent_id": "410600",
            "level": "3",
            "full_name": "河南省-鹤壁市-淇县"
        },
        {
            "id": "410700",
            "name": "新乡市",
            "parent_id": "410000",
            "level": "2",
            "full_name": "河南省-新乡市"
        },
        {
            "id": "410701",
            "name": "市辖区",
            "parent_id": "410700",
            "level": "3",
            "full_name": "河南省-新乡市-市辖区"
        },
        {
            "id": "410702",
            "name": "红旗区",
            "parent_id": "410700",
            "level": "3",
            "full_name": "河南省-新乡市-红旗区"
        },
        {
            "id": "410703",
            "name": "卫滨区",
            "parent_id": "410700",
            "level": "3",
            "full_name": "河南省-新乡市-卫滨区"
        },
        {
            "id": "410704",
            "name": "凤泉区",
            "parent_id": "410700",
            "level": "3",
            "full_name": "河南省-新乡市-凤泉区"
        },
        {
            "id": "410711",
            "name": "牧野区",
            "parent_id": "410700",
            "level": "3",
            "full_name": "河南省-新乡市-牧野区"
        },
        {
            "id": "410721",
            "name": "新乡县",
            "parent_id": "410700",
            "level": "3",
            "full_name": "河南省-新乡市-新乡县"
        },
        {
            "id": "410724",
            "name": "获嘉县",
            "parent_id": "410700",
            "level": "3",
            "full_name": "河南省-新乡市-获嘉县"
        },
        {
            "id": "410725",
            "name": "原阳县",
            "parent_id": "410700",
            "level": "3",
            "full_name": "河南省-新乡市-原阳县"
        },
        {
            "id": "410726",
            "name": "延津县",
            "parent_id": "410700",
            "level": "3",
            "full_name": "河南省-新乡市-延津县"
        },
        {
            "id": "410727",
            "name": "封丘县",
            "parent_id": "410700",
            "level": "3",
            "full_name": "河南省-新乡市-封丘县"
        },
        {
            "id": "410728",
            "name": "长垣县",
            "parent_id": "410700",
            "level": "3",
            "full_name": "河南省-新乡市-长垣县"
        },
        {
            "id": "410781",
            "name": "卫辉市",
            "parent_id": "410700",
            "level": "3",
            "full_name": "河南省-新乡市-卫辉市"
        },
        {
            "id": "410782",
            "name": "辉县市",
            "parent_id": "410700",
            "level": "3",
            "full_name": "河南省-新乡市-辉县市"
        },
        {
            "id": "410800",
            "name": "焦作市",
            "parent_id": "410000",
            "level": "2",
            "full_name": "河南省-焦作市"
        },
        {
            "id": "410801",
            "name": "市辖区",
            "parent_id": "410800",
            "level": "3",
            "full_name": "河南省-焦作市-市辖区"
        },
        {
            "id": "410802",
            "name": "解放区",
            "parent_id": "410800",
            "level": "3",
            "full_name": "河南省-焦作市-解放区"
        },
        {
            "id": "410803",
            "name": "中站区",
            "parent_id": "410800",
            "level": "3",
            "full_name": "河南省-焦作市-中站区"
        },
        {
            "id": "410804",
            "name": "马村区",
            "parent_id": "410800",
            "level": "3",
            "full_name": "河南省-焦作市-马村区"
        },
        {
            "id": "410811",
            "name": "山阳区",
            "parent_id": "410800",
            "level": "3",
            "full_name": "河南省-焦作市-山阳区"
        },
        {
            "id": "410821",
            "name": "修武县",
            "parent_id": "410800",
            "level": "3",
            "full_name": "河南省-焦作市-修武县"
        },
        {
            "id": "410822",
            "name": "博爱县",
            "parent_id": "410800",
            "level": "3",
            "full_name": "河南省-焦作市-博爱县"
        },
        {
            "id": "410823",
            "name": "武陟县",
            "parent_id": "410800",
            "level": "3",
            "full_name": "河南省-焦作市-武陟县"
        },
        {
            "id": "410825",
            "name": "温县",
            "parent_id": "410800",
            "level": "3",
            "full_name": "河南省-焦作市-温县"
        },
        {
            "id": "410882",
            "name": "沁阳市",
            "parent_id": "410800",
            "level": "3",
            "full_name": "河南省-焦作市-沁阳市"
        },
        {
            "id": "410883",
            "name": "孟州市",
            "parent_id": "410800",
            "level": "3",
            "full_name": "河南省-焦作市-孟州市"
        },
        {
            "id": "410900",
            "name": "濮阳市",
            "parent_id": "410000",
            "level": "2",
            "full_name": "河南省-濮阳市"
        },
        {
            "id": "410901",
            "name": "市辖区",
            "parent_id": "410900",
            "level": "3",
            "full_name": "河南省-濮阳市-市辖区"
        },
        {
            "id": "410902",
            "name": "华龙区",
            "parent_id": "410900",
            "level": "3",
            "full_name": "河南省-濮阳市-华龙区"
        },
        {
            "id": "410922",
            "name": "清丰县",
            "parent_id": "410900",
            "level": "3",
            "full_name": "河南省-濮阳市-清丰县"
        },
        {
            "id": "410923",
            "name": "南乐县",
            "parent_id": "410900",
            "level": "3",
            "full_name": "河南省-濮阳市-南乐县"
        },
        {
            "id": "410926",
            "name": "范县",
            "parent_id": "410900",
            "level": "3",
            "full_name": "河南省-濮阳市-范县"
        },
        {
            "id": "410927",
            "name": "台前县",
            "parent_id": "410900",
            "level": "3",
            "full_name": "河南省-濮阳市-台前县"
        },
        {
            "id": "410928",
            "name": "濮阳县",
            "parent_id": "410900",
            "level": "3",
            "full_name": "河南省-濮阳市-濮阳县"
        },
        {
            "id": "411000",
            "name": "许昌市",
            "parent_id": "410000",
            "level": "2",
            "full_name": "河南省-许昌市"
        },
        {
            "id": "411001",
            "name": "市辖区",
            "parent_id": "411000",
            "level": "3",
            "full_name": "河南省-许昌市-市辖区"
        },
        {
            "id": "411002",
            "name": "魏都区",
            "parent_id": "411000",
            "level": "3",
            "full_name": "河南省-许昌市-魏都区"
        },
        {
            "id": "411023",
            "name": "许昌县",
            "parent_id": "411000",
            "level": "3",
            "full_name": "河南省-许昌市-许昌县"
        },
        {
            "id": "411024",
            "name": "鄢陵县",
            "parent_id": "411000",
            "level": "3",
            "full_name": "河南省-许昌市-鄢陵县"
        },
        {
            "id": "411025",
            "name": "襄城县",
            "parent_id": "411000",
            "level": "3",
            "full_name": "河南省-许昌市-襄城县"
        },
        {
            "id": "411081",
            "name": "禹州市",
            "parent_id": "411000",
            "level": "3",
            "full_name": "河南省-许昌市-禹州市"
        },
        {
            "id": "411082",
            "name": "长葛市",
            "parent_id": "411000",
            "level": "3",
            "full_name": "河南省-许昌市-长葛市"
        },
        {
            "id": "411100",
            "name": "漯河市",
            "parent_id": "410000",
            "level": "2",
            "full_name": "河南省-漯河市"
        },
        {
            "id": "411101",
            "name": "市辖区",
            "parent_id": "411100",
            "level": "3",
            "full_name": "河南省-漯河市-市辖区"
        },
        {
            "id": "411102",
            "name": "源汇区",
            "parent_id": "411100",
            "level": "3",
            "full_name": "河南省-漯河市-源汇区"
        },
        {
            "id": "411103",
            "name": "郾城区",
            "parent_id": "411100",
            "level": "3",
            "full_name": "河南省-漯河市-郾城区"
        },
        {
            "id": "411104",
            "name": "召陵区",
            "parent_id": "411100",
            "level": "3",
            "full_name": "河南省-漯河市-召陵区"
        },
        {
            "id": "411121",
            "name": "舞阳县",
            "parent_id": "411100",
            "level": "3",
            "full_name": "河南省-漯河市-舞阳县"
        },
        {
            "id": "411122",
            "name": "临颍县",
            "parent_id": "411100",
            "level": "3",
            "full_name": "河南省-漯河市-临颍县"
        },
        {
            "id": "411200",
            "name": "三门峡市",
            "parent_id": "410000",
            "level": "2",
            "full_name": "河南省-三门峡市"
        },
        {
            "id": "411201",
            "name": "市辖区",
            "parent_id": "411200",
            "level": "3",
            "full_name": "河南省-三门峡市-市辖区"
        },
        {
            "id": "411202",
            "name": "湖滨区",
            "parent_id": "411200",
            "level": "3",
            "full_name": "河南省-三门峡市-湖滨区"
        },
        {
            "id": "411221",
            "name": "渑池县",
            "parent_id": "411200",
            "level": "3",
            "full_name": "河南省-三门峡市-渑池县"
        },
        {
            "id": "411222",
            "name": "陕县",
            "parent_id": "411200",
            "level": "3",
            "full_name": "河南省-三门峡市-陕县"
        },
        {
            "id": "411224",
            "name": "卢氏县",
            "parent_id": "411200",
            "level": "3",
            "full_name": "河南省-三门峡市-卢氏县"
        },
        {
            "id": "411281",
            "name": "义马市",
            "parent_id": "411200",
            "level": "3",
            "full_name": "河南省-三门峡市-义马市"
        },
        {
            "id": "411282",
            "name": "灵宝市",
            "parent_id": "411200",
            "level": "3",
            "full_name": "河南省-三门峡市-灵宝市"
        },
        {
            "id": "411300",
            "name": "南阳市",
            "parent_id": "410000",
            "level": "2",
            "full_name": "河南省-南阳市"
        },
        {
            "id": "411301",
            "name": "市辖区",
            "parent_id": "411300",
            "level": "3",
            "full_name": "河南省-南阳市-市辖区"
        },
        {
            "id": "411302",
            "name": "宛城区",
            "parent_id": "411300",
            "level": "3",
            "full_name": "河南省-南阳市-宛城区"
        },
        {
            "id": "411303",
            "name": "卧龙区",
            "parent_id": "411300",
            "level": "3",
            "full_name": "河南省-南阳市-卧龙区"
        },
        {
            "id": "411321",
            "name": "南召县",
            "parent_id": "411300",
            "level": "3",
            "full_name": "河南省-南阳市-南召县"
        },
        {
            "id": "411322",
            "name": "方城县",
            "parent_id": "411300",
            "level": "3",
            "full_name": "河南省-南阳市-方城县"
        },
        {
            "id": "411323",
            "name": "西峡县",
            "parent_id": "411300",
            "level": "3",
            "full_name": "河南省-南阳市-西峡县"
        },
        {
            "id": "411324",
            "name": "镇平县",
            "parent_id": "411300",
            "level": "3",
            "full_name": "河南省-南阳市-镇平县"
        },
        {
            "id": "411325",
            "name": "内乡县",
            "parent_id": "411300",
            "level": "3",
            "full_name": "河南省-南阳市-内乡县"
        },
        {
            "id": "411326",
            "name": "淅川县",
            "parent_id": "411300",
            "level": "3",
            "full_name": "河南省-南阳市-淅川县"
        },
        {
            "id": "411327",
            "name": "社旗县",
            "parent_id": "411300",
            "level": "3",
            "full_name": "河南省-南阳市-社旗县"
        },
        {
            "id": "411328",
            "name": "唐河县",
            "parent_id": "411300",
            "level": "3",
            "full_name": "河南省-南阳市-唐河县"
        },
        {
            "id": "411329",
            "name": "新野县",
            "parent_id": "411300",
            "level": "3",
            "full_name": "河南省-南阳市-新野县"
        },
        {
            "id": "411330",
            "name": "桐柏县",
            "parent_id": "411300",
            "level": "3",
            "full_name": "河南省-南阳市-桐柏县"
        },
        {
            "id": "411381",
            "name": "邓州市",
            "parent_id": "411300",
            "level": "3",
            "full_name": "河南省-南阳市-邓州市"
        },
        {
            "id": "411400",
            "name": "商丘市",
            "parent_id": "410000",
            "level": "2",
            "full_name": "河南省-商丘市"
        },
        {
            "id": "411401",
            "name": "市辖区",
            "parent_id": "411400",
            "level": "3",
            "full_name": "河南省-商丘市-市辖区"
        },
        {
            "id": "411402",
            "name": "梁园区",
            "parent_id": "411400",
            "level": "3",
            "full_name": "河南省-商丘市-梁园区"
        },
        {
            "id": "411403",
            "name": "睢阳区",
            "parent_id": "411400",
            "level": "3",
            "full_name": "河南省-商丘市-睢阳区"
        },
        {
            "id": "411421",
            "name": "民权县",
            "parent_id": "411400",
            "level": "3",
            "full_name": "河南省-商丘市-民权县"
        },
        {
            "id": "411422",
            "name": "睢县",
            "parent_id": "411400",
            "level": "3",
            "full_name": "河南省-商丘市-睢县"
        },
        {
            "id": "411423",
            "name": "宁陵县",
            "parent_id": "411400",
            "level": "3",
            "full_name": "河南省-商丘市-宁陵县"
        },
        {
            "id": "411424",
            "name": "柘城县",
            "parent_id": "411400",
            "level": "3",
            "full_name": "河南省-商丘市-柘城县"
        },
        {
            "id": "411425",
            "name": "虞城县",
            "parent_id": "411400",
            "level": "3",
            "full_name": "河南省-商丘市-虞城县"
        },
        {
            "id": "411426",
            "name": "夏邑县",
            "parent_id": "411400",
            "level": "3",
            "full_name": "河南省-商丘市-夏邑县"
        },
        {
            "id": "411481",
            "name": "永城市",
            "parent_id": "411400",
            "level": "3",
            "full_name": "河南省-商丘市-永城市"
        },
        {
            "id": "411500",
            "name": "信阳市",
            "parent_id": "410000",
            "level": "2",
            "full_name": "河南省-信阳市"
        },
        {
            "id": "411501",
            "name": "市辖区",
            "parent_id": "411500",
            "level": "3",
            "full_name": "河南省-信阳市-市辖区"
        },
        {
            "id": "411502",
            "name": "浉河区",
            "parent_id": "411500",
            "level": "3",
            "full_name": "河南省-信阳市-浉河区"
        },
        {
            "id": "411503",
            "name": "平桥区",
            "parent_id": "411500",
            "level": "3",
            "full_name": "河南省-信阳市-平桥区"
        },
        {
            "id": "411521",
            "name": "罗山县",
            "parent_id": "411500",
            "level": "3",
            "full_name": "河南省-信阳市-罗山县"
        },
        {
            "id": "411522",
            "name": "光山县",
            "parent_id": "411500",
            "level": "3",
            "full_name": "河南省-信阳市-光山县"
        },
        {
            "id": "411523",
            "name": "新县",
            "parent_id": "411500",
            "level": "3",
            "full_name": "河南省-信阳市-新县"
        },
        {
            "id": "411524",
            "name": "商城县",
            "parent_id": "411500",
            "level": "3",
            "full_name": "河南省-信阳市-商城县"
        },
        {
            "id": "411525",
            "name": "固始县",
            "parent_id": "411500",
            "level": "3",
            "full_name": "河南省-信阳市-固始县"
        },
        {
            "id": "411526",
            "name": "潢川县",
            "parent_id": "411500",
            "level": "3",
            "full_name": "河南省-信阳市-潢川县"
        },
        {
            "id": "411527",
            "name": "淮滨县",
            "parent_id": "411500",
            "level": "3",
            "full_name": "河南省-信阳市-淮滨县"
        },
        {
            "id": "411528",
            "name": "息县",
            "parent_id": "411500",
            "level": "3",
            "full_name": "河南省-信阳市-息县"
        },
        {
            "id": "411600",
            "name": "周口市",
            "parent_id": "410000",
            "level": "2",
            "full_name": "河南省-周口市"
        },
        {
            "id": "411601",
            "name": "市辖区",
            "parent_id": "411600",
            "level": "3",
            "full_name": "河南省-周口市-市辖区"
        },
        {
            "id": "411602",
            "name": "川汇区",
            "parent_id": "411600",
            "level": "3",
            "full_name": "河南省-周口市-川汇区"
        },
        {
            "id": "411621",
            "name": "扶沟县",
            "parent_id": "411600",
            "level": "3",
            "full_name": "河南省-周口市-扶沟县"
        },
        {
            "id": "411622",
            "name": "西华县",
            "parent_id": "411600",
            "level": "3",
            "full_name": "河南省-周口市-西华县"
        },
        {
            "id": "411623",
            "name": "商水县",
            "parent_id": "411600",
            "level": "3",
            "full_name": "河南省-周口市-商水县"
        },
        {
            "id": "411624",
            "name": "沈丘县",
            "parent_id": "411600",
            "level": "3",
            "full_name": "河南省-周口市-沈丘县"
        },
        {
            "id": "411625",
            "name": "郸城县",
            "parent_id": "411600",
            "level": "3",
            "full_name": "河南省-周口市-郸城县"
        },
        {
            "id": "411626",
            "name": "淮阳县",
            "parent_id": "411600",
            "level": "3",
            "full_name": "河南省-周口市-淮阳县"
        },
        {
            "id": "411627",
            "name": "太康县",
            "parent_id": "411600",
            "level": "3",
            "full_name": "河南省-周口市-太康县"
        },
        {
            "id": "411628",
            "name": "鹿邑县",
            "parent_id": "411600",
            "level": "3",
            "full_name": "河南省-周口市-鹿邑县"
        },
        {
            "id": "411681",
            "name": "项城市",
            "parent_id": "411600",
            "level": "3",
            "full_name": "河南省-周口市-项城市"
        },
        {
            "id": "411700",
            "name": "驻马店市",
            "parent_id": "410000",
            "level": "2",
            "full_name": "河南省-驻马店市"
        },
        {
            "id": "411701",
            "name": "市辖区",
            "parent_id": "411700",
            "level": "3",
            "full_name": "河南省-驻马店市-市辖区"
        },
        {
            "id": "411702",
            "name": "驿城区",
            "parent_id": "411700",
            "level": "3",
            "full_name": "河南省-驻马店市-驿城区"
        },
        {
            "id": "411721",
            "name": "西平县",
            "parent_id": "411700",
            "level": "3",
            "full_name": "河南省-驻马店市-西平县"
        },
        {
            "id": "411722",
            "name": "上蔡县",
            "parent_id": "411700",
            "level": "3",
            "full_name": "河南省-驻马店市-上蔡县"
        },
        {
            "id": "411723",
            "name": "平舆县",
            "parent_id": "411700",
            "level": "3",
            "full_name": "河南省-驻马店市-平舆县"
        },
        {
            "id": "411724",
            "name": "正阳县",
            "parent_id": "411700",
            "level": "3",
            "full_name": "河南省-驻马店市-正阳县"
        },
        {
            "id": "411725",
            "name": "确山县",
            "parent_id": "411700",
            "level": "3",
            "full_name": "河南省-驻马店市-确山县"
        },
        {
            "id": "411726",
            "name": "泌阳县",
            "parent_id": "411700",
            "level": "3",
            "full_name": "河南省-驻马店市-泌阳县"
        },
        {
            "id": "411727",
            "name": "汝南县",
            "parent_id": "411700",
            "level": "3",
            "full_name": "河南省-驻马店市-汝南县"
        },
        {
            "id": "411728",
            "name": "遂平县",
            "parent_id": "411700",
            "level": "3",
            "full_name": "河南省-驻马店市-遂平县"
        },
        {
            "id": "411729",
            "name": "新蔡县",
            "parent_id": "411700",
            "level": "3",
            "full_name": "河南省-驻马店市-新蔡县"
        },
        {
            "id": "419000",
            "name": "省直辖县级行政区划",
            "parent_id": "410000",
            "level": "2",
            "full_name": "河南省-省直辖县级行政区划"
        },
        {
            "id": "419001",
            "name": "济源市",
            "parent_id": "419000",
            "level": "3",
            "full_name": "河南省-省直辖县级行政区划-济源市"
        },
        {
            "id": "420000",
            "name": "湖北省",
            "parent_id": "0",
            "level": "1",
            "full_name": "湖北省"
        },
        {
            "id": "420100",
            "name": "武汉市",
            "parent_id": "420000",
            "level": "2",
            "full_name": "湖北省-武汉市"
        },
        {
            "id": "420101",
            "name": "市辖区",
            "parent_id": "420100",
            "level": "3",
            "full_name": "湖北省-武汉市-市辖区"
        },
        {
            "id": "420102",
            "name": "江岸区",
            "parent_id": "420100",
            "level": "3",
            "full_name": "湖北省-武汉市-江岸区"
        },
        {
            "id": "420103",
            "name": "江汉区",
            "parent_id": "420100",
            "level": "3",
            "full_name": "湖北省-武汉市-江汉区"
        },
        {
            "id": "420104",
            "name": "硚口区",
            "parent_id": "420100",
            "level": "3",
            "full_name": "湖北省-武汉市-硚口区"
        },
        {
            "id": "420105",
            "name": "汉阳区",
            "parent_id": "420100",
            "level": "3",
            "full_name": "湖北省-武汉市-汉阳区"
        },
        {
            "id": "420106",
            "name": "武昌区",
            "parent_id": "420100",
            "level": "3",
            "full_name": "湖北省-武汉市-武昌区"
        },
        {
            "id": "420107",
            "name": "青山区",
            "parent_id": "420100",
            "level": "3",
            "full_name": "湖北省-武汉市-青山区"
        },
        {
            "id": "420111",
            "name": "洪山区",
            "parent_id": "420100",
            "level": "3",
            "full_name": "湖北省-武汉市-洪山区"
        },
        {
            "id": "420112",
            "name": "东西湖区",
            "parent_id": "420100",
            "level": "3",
            "full_name": "湖北省-武汉市-东西湖区"
        },
        {
            "id": "420113",
            "name": "汉南区",
            "parent_id": "420100",
            "level": "3",
            "full_name": "湖北省-武汉市-汉南区"
        },
        {
            "id": "420114",
            "name": "蔡甸区",
            "parent_id": "420100",
            "level": "3",
            "full_name": "湖北省-武汉市-蔡甸区"
        },
        {
            "id": "420115",
            "name": "江夏区",
            "parent_id": "420100",
            "level": "3",
            "full_name": "湖北省-武汉市-江夏区"
        },
        {
            "id": "420116",
            "name": "黄陂区",
            "parent_id": "420100",
            "level": "3",
            "full_name": "湖北省-武汉市-黄陂区"
        },
        {
            "id": "420117",
            "name": "新洲区",
            "parent_id": "420100",
            "level": "3",
            "full_name": "湖北省-武汉市-新洲区"
        },
        {
            "id": "420200",
            "name": "黄石市",
            "parent_id": "420000",
            "level": "2",
            "full_name": "湖北省-黄石市"
        },
        {
            "id": "420201",
            "name": "市辖区",
            "parent_id": "420200",
            "level": "3",
            "full_name": "湖北省-黄石市-市辖区"
        },
        {
            "id": "420202",
            "name": "黄石港区",
            "parent_id": "420200",
            "level": "3",
            "full_name": "湖北省-黄石市-黄石港区"
        },
        {
            "id": "420203",
            "name": "西塞山区",
            "parent_id": "420200",
            "level": "3",
            "full_name": "湖北省-黄石市-西塞山区"
        },
        {
            "id": "420204",
            "name": "下陆区",
            "parent_id": "420200",
            "level": "3",
            "full_name": "湖北省-黄石市-下陆区"
        },
        {
            "id": "420205",
            "name": "铁山区",
            "parent_id": "420200",
            "level": "3",
            "full_name": "湖北省-黄石市-铁山区"
        },
        {
            "id": "420222",
            "name": "阳新县",
            "parent_id": "420200",
            "level": "3",
            "full_name": "湖北省-黄石市-阳新县"
        },
        {
            "id": "420281",
            "name": "大冶市",
            "parent_id": "420200",
            "level": "3",
            "full_name": "湖北省-黄石市-大冶市"
        },
        {
            "id": "420300",
            "name": "十堰市",
            "parent_id": "420000",
            "level": "2",
            "full_name": "湖北省-十堰市"
        },
        {
            "id": "420301",
            "name": "市辖区",
            "parent_id": "420300",
            "level": "3",
            "full_name": "湖北省-十堰市-市辖区"
        },
        {
            "id": "420302",
            "name": "茅箭区",
            "parent_id": "420300",
            "level": "3",
            "full_name": "湖北省-十堰市-茅箭区"
        },
        {
            "id": "420303",
            "name": "张湾区",
            "parent_id": "420300",
            "level": "3",
            "full_name": "湖北省-十堰市-张湾区"
        },
        {
            "id": "420304",
            "name": "郧阳区",
            "parent_id": "420300",
            "level": "3",
            "full_name": "湖北省-十堰市-郧阳区"
        },
        {
            "id": "420322",
            "name": "郧西县",
            "parent_id": "420300",
            "level": "3",
            "full_name": "湖北省-十堰市-郧西县"
        },
        {
            "id": "420323",
            "name": "竹山县",
            "parent_id": "420300",
            "level": "3",
            "full_name": "湖北省-十堰市-竹山县"
        },
        {
            "id": "420324",
            "name": "竹溪县",
            "parent_id": "420300",
            "level": "3",
            "full_name": "湖北省-十堰市-竹溪县"
        },
        {
            "id": "420325",
            "name": "房县",
            "parent_id": "420300",
            "level": "3",
            "full_name": "湖北省-十堰市-房县"
        },
        {
            "id": "420381",
            "name": "丹江口市",
            "parent_id": "420300",
            "level": "3",
            "full_name": "湖北省-十堰市-丹江口市"
        },
        {
            "id": "420500",
            "name": "宜昌市",
            "parent_id": "420000",
            "level": "2",
            "full_name": "湖北省-宜昌市"
        },
        {
            "id": "420501",
            "name": "市辖区",
            "parent_id": "420500",
            "level": "3",
            "full_name": "湖北省-宜昌市-市辖区"
        },
        {
            "id": "420502",
            "name": "西陵区",
            "parent_id": "420500",
            "level": "3",
            "full_name": "湖北省-宜昌市-西陵区"
        },
        {
            "id": "420503",
            "name": "伍家岗区",
            "parent_id": "420500",
            "level": "3",
            "full_name": "湖北省-宜昌市-伍家岗区"
        },
        {
            "id": "420504",
            "name": "点军区",
            "parent_id": "420500",
            "level": "3",
            "full_name": "湖北省-宜昌市-点军区"
        },
        {
            "id": "420505",
            "name": "猇亭区",
            "parent_id": "420500",
            "level": "3",
            "full_name": "湖北省-宜昌市-猇亭区"
        },
        {
            "id": "420506",
            "name": "夷陵区",
            "parent_id": "420500",
            "level": "3",
            "full_name": "湖北省-宜昌市-夷陵区"
        },
        {
            "id": "420525",
            "name": "远安县",
            "parent_id": "420500",
            "level": "3",
            "full_name": "湖北省-宜昌市-远安县"
        },
        {
            "id": "420526",
            "name": "兴山县",
            "parent_id": "420500",
            "level": "3",
            "full_name": "湖北省-宜昌市-兴山县"
        },
        {
            "id": "420527",
            "name": "秭归县",
            "parent_id": "420500",
            "level": "3",
            "full_name": "湖北省-宜昌市-秭归县"
        },
        {
            "id": "420528",
            "name": "长阳土家族自治县",
            "parent_id": "420500",
            "level": "3",
            "full_name": "湖北省-宜昌市-长阳土家族自治县"
        },
        {
            "id": "420529",
            "name": "五峰土家族自治县",
            "parent_id": "420500",
            "level": "3",
            "full_name": "湖北省-宜昌市-五峰土家族自治县"
        },
        {
            "id": "420581",
            "name": "宜都市",
            "parent_id": "420500",
            "level": "3",
            "full_name": "湖北省-宜昌市-宜都市"
        },
        {
            "id": "420582",
            "name": "当阳市",
            "parent_id": "420500",
            "level": "3",
            "full_name": "湖北省-宜昌市-当阳市"
        },
        {
            "id": "420583",
            "name": "枝江市",
            "parent_id": "420500",
            "level": "3",
            "full_name": "湖北省-宜昌市-枝江市"
        },
        {
            "id": "420600",
            "name": "襄阳市",
            "parent_id": "420000",
            "level": "2",
            "full_name": "湖北省-襄阳市"
        },
        {
            "id": "420601",
            "name": "市辖区",
            "parent_id": "420600",
            "level": "3",
            "full_name": "湖北省-襄阳市-市辖区"
        },
        {
            "id": "420602",
            "name": "襄城区",
            "parent_id": "420600",
            "level": "3",
            "full_name": "湖北省-襄阳市-襄城区"
        },
        {
            "id": "420606",
            "name": "樊城区",
            "parent_id": "420600",
            "level": "3",
            "full_name": "湖北省-襄阳市-樊城区"
        },
        {
            "id": "420607",
            "name": "襄州区",
            "parent_id": "420600",
            "level": "3",
            "full_name": "湖北省-襄阳市-襄州区"
        },
        {
            "id": "420624",
            "name": "南漳县",
            "parent_id": "420600",
            "level": "3",
            "full_name": "湖北省-襄阳市-南漳县"
        },
        {
            "id": "420625",
            "name": "谷城县",
            "parent_id": "420600",
            "level": "3",
            "full_name": "湖北省-襄阳市-谷城县"
        },
        {
            "id": "420626",
            "name": "保康县",
            "parent_id": "420600",
            "level": "3",
            "full_name": "湖北省-襄阳市-保康县"
        },
        {
            "id": "420682",
            "name": "老河口市",
            "parent_id": "420600",
            "level": "3",
            "full_name": "湖北省-襄阳市-老河口市"
        },
        {
            "id": "420683",
            "name": "枣阳市",
            "parent_id": "420600",
            "level": "3",
            "full_name": "湖北省-襄阳市-枣阳市"
        },
        {
            "id": "420684",
            "name": "宜城市",
            "parent_id": "420600",
            "level": "3",
            "full_name": "湖北省-襄阳市-宜城市"
        },
        {
            "id": "420700",
            "name": "鄂州市",
            "parent_id": "420000",
            "level": "2",
            "full_name": "湖北省-鄂州市"
        },
        {
            "id": "420701",
            "name": "市辖区",
            "parent_id": "420700",
            "level": "3",
            "full_name": "湖北省-鄂州市-市辖区"
        },
        {
            "id": "420702",
            "name": "梁子湖区",
            "parent_id": "420700",
            "level": "3",
            "full_name": "湖北省-鄂州市-梁子湖区"
        },
        {
            "id": "420703",
            "name": "华容区",
            "parent_id": "420700",
            "level": "3",
            "full_name": "湖北省-鄂州市-华容区"
        },
        {
            "id": "420704",
            "name": "鄂城区",
            "parent_id": "420700",
            "level": "3",
            "full_name": "湖北省-鄂州市-鄂城区"
        },
        {
            "id": "420800",
            "name": "荆门市",
            "parent_id": "420000",
            "level": "2",
            "full_name": "湖北省-荆门市"
        },
        {
            "id": "420801",
            "name": "市辖区",
            "parent_id": "420800",
            "level": "3",
            "full_name": "湖北省-荆门市-市辖区"
        },
        {
            "id": "420802",
            "name": "东宝区",
            "parent_id": "420800",
            "level": "3",
            "full_name": "湖北省-荆门市-东宝区"
        },
        {
            "id": "420804",
            "name": "掇刀区",
            "parent_id": "420800",
            "level": "3",
            "full_name": "湖北省-荆门市-掇刀区"
        },
        {
            "id": "420821",
            "name": "京山县",
            "parent_id": "420800",
            "level": "3",
            "full_name": "湖北省-荆门市-京山县"
        },
        {
            "id": "420822",
            "name": "沙洋县",
            "parent_id": "420800",
            "level": "3",
            "full_name": "湖北省-荆门市-沙洋县"
        },
        {
            "id": "420881",
            "name": "钟祥市",
            "parent_id": "420800",
            "level": "3",
            "full_name": "湖北省-荆门市-钟祥市"
        },
        {
            "id": "420900",
            "name": "孝感市",
            "parent_id": "420000",
            "level": "2",
            "full_name": "湖北省-孝感市"
        },
        {
            "id": "420901",
            "name": "市辖区",
            "parent_id": "420900",
            "level": "3",
            "full_name": "湖北省-孝感市-市辖区"
        },
        {
            "id": "420902",
            "name": "孝南区",
            "parent_id": "420900",
            "level": "3",
            "full_name": "湖北省-孝感市-孝南区"
        },
        {
            "id": "420921",
            "name": "孝昌县",
            "parent_id": "420900",
            "level": "3",
            "full_name": "湖北省-孝感市-孝昌县"
        },
        {
            "id": "420922",
            "name": "大悟县",
            "parent_id": "420900",
            "level": "3",
            "full_name": "湖北省-孝感市-大悟县"
        },
        {
            "id": "420923",
            "name": "云梦县",
            "parent_id": "420900",
            "level": "3",
            "full_name": "湖北省-孝感市-云梦县"
        },
        {
            "id": "420981",
            "name": "应城市",
            "parent_id": "420900",
            "level": "3",
            "full_name": "湖北省-孝感市-应城市"
        },
        {
            "id": "420982",
            "name": "安陆市",
            "parent_id": "420900",
            "level": "3",
            "full_name": "湖北省-孝感市-安陆市"
        },
        {
            "id": "420984",
            "name": "汉川市",
            "parent_id": "420900",
            "level": "3",
            "full_name": "湖北省-孝感市-汉川市"
        },
        {
            "id": "421000",
            "name": "荆州市",
            "parent_id": "420000",
            "level": "2",
            "full_name": "湖北省-荆州市"
        },
        {
            "id": "421001",
            "name": "市辖区",
            "parent_id": "421000",
            "level": "3",
            "full_name": "湖北省-荆州市-市辖区"
        },
        {
            "id": "421002",
            "name": "沙市区",
            "parent_id": "421000",
            "level": "3",
            "full_name": "湖北省-荆州市-沙市区"
        },
        {
            "id": "421003",
            "name": "荆州区",
            "parent_id": "421000",
            "level": "3",
            "full_name": "湖北省-荆州市-荆州区"
        },
        {
            "id": "421022",
            "name": "公安县",
            "parent_id": "421000",
            "level": "3",
            "full_name": "湖北省-荆州市-公安县"
        },
        {
            "id": "421023",
            "name": "监利县",
            "parent_id": "421000",
            "level": "3",
            "full_name": "湖北省-荆州市-监利县"
        },
        {
            "id": "421024",
            "name": "江陵县",
            "parent_id": "421000",
            "level": "3",
            "full_name": "湖北省-荆州市-江陵县"
        },
        {
            "id": "421081",
            "name": "石首市",
            "parent_id": "421000",
            "level": "3",
            "full_name": "湖北省-荆州市-石首市"
        },
        {
            "id": "421083",
            "name": "洪湖市",
            "parent_id": "421000",
            "level": "3",
            "full_name": "湖北省-荆州市-洪湖市"
        },
        {
            "id": "421087",
            "name": "松滋市",
            "parent_id": "421000",
            "level": "3",
            "full_name": "湖北省-荆州市-松滋市"
        },
        {
            "id": "421100",
            "name": "黄冈市",
            "parent_id": "420000",
            "level": "2",
            "full_name": "湖北省-黄冈市"
        },
        {
            "id": "421101",
            "name": "市辖区",
            "parent_id": "421100",
            "level": "3",
            "full_name": "湖北省-黄冈市-市辖区"
        },
        {
            "id": "421102",
            "name": "黄州区",
            "parent_id": "421100",
            "level": "3",
            "full_name": "湖北省-黄冈市-黄州区"
        },
        {
            "id": "421121",
            "name": "团风县",
            "parent_id": "421100",
            "level": "3",
            "full_name": "湖北省-黄冈市-团风县"
        },
        {
            "id": "421122",
            "name": "红安县",
            "parent_id": "421100",
            "level": "3",
            "full_name": "湖北省-黄冈市-红安县"
        },
        {
            "id": "421123",
            "name": "罗田县",
            "parent_id": "421100",
            "level": "3",
            "full_name": "湖北省-黄冈市-罗田县"
        },
        {
            "id": "421124",
            "name": "英山县",
            "parent_id": "421100",
            "level": "3",
            "full_name": "湖北省-黄冈市-英山县"
        },
        {
            "id": "421125",
            "name": "浠水县",
            "parent_id": "421100",
            "level": "3",
            "full_name": "湖北省-黄冈市-浠水县"
        },
        {
            "id": "421126",
            "name": "蕲春县",
            "parent_id": "421100",
            "level": "3",
            "full_name": "湖北省-黄冈市-蕲春县"
        },
        {
            "id": "421127",
            "name": "黄梅县",
            "parent_id": "421100",
            "level": "3",
            "full_name": "湖北省-黄冈市-黄梅县"
        },
        {
            "id": "421181",
            "name": "麻城市",
            "parent_id": "421100",
            "level": "3",
            "full_name": "湖北省-黄冈市-麻城市"
        },
        {
            "id": "421182",
            "name": "武穴市",
            "parent_id": "421100",
            "level": "3",
            "full_name": "湖北省-黄冈市-武穴市"
        },
        {
            "id": "421200",
            "name": "咸宁市",
            "parent_id": "420000",
            "level": "2",
            "full_name": "湖北省-咸宁市"
        },
        {
            "id": "421201",
            "name": "市辖区",
            "parent_id": "421200",
            "level": "3",
            "full_name": "湖北省-咸宁市-市辖区"
        },
        {
            "id": "421202",
            "name": "咸安区",
            "parent_id": "421200",
            "level": "3",
            "full_name": "湖北省-咸宁市-咸安区"
        },
        {
            "id": "421221",
            "name": "嘉鱼县",
            "parent_id": "421200",
            "level": "3",
            "full_name": "湖北省-咸宁市-嘉鱼县"
        },
        {
            "id": "421222",
            "name": "通城县",
            "parent_id": "421200",
            "level": "3",
            "full_name": "湖北省-咸宁市-通城县"
        },
        {
            "id": "421223",
            "name": "崇阳县",
            "parent_id": "421200",
            "level": "3",
            "full_name": "湖北省-咸宁市-崇阳县"
        },
        {
            "id": "421224",
            "name": "通山县",
            "parent_id": "421200",
            "level": "3",
            "full_name": "湖北省-咸宁市-通山县"
        },
        {
            "id": "421281",
            "name": "赤壁市",
            "parent_id": "421200",
            "level": "3",
            "full_name": "湖北省-咸宁市-赤壁市"
        },
        {
            "id": "421300",
            "name": "随州市",
            "parent_id": "420000",
            "level": "2",
            "full_name": "湖北省-随州市"
        },
        {
            "id": "421301",
            "name": "市辖区",
            "parent_id": "421300",
            "level": "3",
            "full_name": "湖北省-随州市-市辖区"
        },
        {
            "id": "421303",
            "name": "曾都区",
            "parent_id": "421300",
            "level": "3",
            "full_name": "湖北省-随州市-曾都区"
        },
        {
            "id": "421321",
            "name": "随县",
            "parent_id": "421300",
            "level": "3",
            "full_name": "湖北省-随州市-随县"
        },
        {
            "id": "421381",
            "name": "广水市",
            "parent_id": "421300",
            "level": "3",
            "full_name": "湖北省-随州市-广水市"
        },
        {
            "id": "422800",
            "name": "恩施土家族苗族自治州",
            "parent_id": "420000",
            "level": "2",
            "full_name": "湖北省-恩施土家族苗族自治州"
        },
        {
            "id": "422801",
            "name": "恩施市",
            "parent_id": "422800",
            "level": "3",
            "full_name": "湖北省-恩施土家族苗族自治州-恩施市"
        },
        {
            "id": "422802",
            "name": "利川市",
            "parent_id": "422800",
            "level": "3",
            "full_name": "湖北省-恩施土家族苗族自治州-利川市"
        },
        {
            "id": "422822",
            "name": "建始县",
            "parent_id": "422800",
            "level": "3",
            "full_name": "湖北省-恩施土家族苗族自治州-建始县"
        },
        {
            "id": "422823",
            "name": "巴东县",
            "parent_id": "422800",
            "level": "3",
            "full_name": "湖北省-恩施土家族苗族自治州-巴东县"
        },
        {
            "id": "422825",
            "name": "宣恩县",
            "parent_id": "422800",
            "level": "3",
            "full_name": "湖北省-恩施土家族苗族自治州-宣恩县"
        },
        {
            "id": "422826",
            "name": "咸丰县",
            "parent_id": "422800",
            "level": "3",
            "full_name": "湖北省-恩施土家族苗族自治州-咸丰县"
        },
        {
            "id": "422827",
            "name": "来凤县",
            "parent_id": "422800",
            "level": "3",
            "full_name": "湖北省-恩施土家族苗族自治州-来凤县"
        },
        {
            "id": "422828",
            "name": "鹤峰县",
            "parent_id": "422800",
            "level": "3",
            "full_name": "湖北省-恩施土家族苗族自治州-鹤峰县"
        },
        {
            "id": "429000",
            "name": "省直辖县级行政区划",
            "parent_id": "420000",
            "level": "2",
            "full_name": "湖北省-省直辖县级行政区划"
        },
        {
            "id": "429004",
            "name": "仙桃市",
            "parent_id": "429000",
            "level": "3",
            "full_name": "湖北省-省直辖县级行政区划-仙桃市"
        },
        {
            "id": "429005",
            "name": "潜江市",
            "parent_id": "429000",
            "level": "3",
            "full_name": "湖北省-省直辖县级行政区划-潜江市"
        },
        {
            "id": "429006",
            "name": "天门市",
            "parent_id": "429000",
            "level": "3",
            "full_name": "湖北省-省直辖县级行政区划-天门市"
        },
        {
            "id": "429021",
            "name": "神农架林区",
            "parent_id": "429000",
            "level": "3",
            "full_name": "湖北省-省直辖县级行政区划-神农架林区"
        },
        {
            "id": "430000",
            "name": "湖南省",
            "parent_id": "0",
            "level": "1",
            "full_name": "湖南省"
        },
        {
            "id": "430100",
            "name": "长沙市",
            "parent_id": "430000",
            "level": "2",
            "full_name": "湖南省-长沙市"
        },
        {
            "id": "430101",
            "name": "市辖区",
            "parent_id": "430100",
            "level": "3",
            "full_name": "湖南省-长沙市-市辖区"
        },
        {
            "id": "430102",
            "name": "芙蓉区",
            "parent_id": "430100",
            "level": "3",
            "full_name": "湖南省-长沙市-芙蓉区"
        },
        {
            "id": "430103",
            "name": "天心区",
            "parent_id": "430100",
            "level": "3",
            "full_name": "湖南省-长沙市-天心区"
        },
        {
            "id": "430104",
            "name": "岳麓区",
            "parent_id": "430100",
            "level": "3",
            "full_name": "湖南省-长沙市-岳麓区"
        },
        {
            "id": "430105",
            "name": "开福区",
            "parent_id": "430100",
            "level": "3",
            "full_name": "湖南省-长沙市-开福区"
        },
        {
            "id": "430111",
            "name": "雨花区",
            "parent_id": "430100",
            "level": "3",
            "full_name": "湖南省-长沙市-雨花区"
        },
        {
            "id": "430112",
            "name": "望城区",
            "parent_id": "430100",
            "level": "3",
            "full_name": "湖南省-长沙市-望城区"
        },
        {
            "id": "430121",
            "name": "长沙县",
            "parent_id": "430100",
            "level": "3",
            "full_name": "湖南省-长沙市-长沙县"
        },
        {
            "id": "430124",
            "name": "宁乡县",
            "parent_id": "430100",
            "level": "3",
            "full_name": "湖南省-长沙市-宁乡县"
        },
        {
            "id": "430181",
            "name": "浏阳市",
            "parent_id": "430100",
            "level": "3",
            "full_name": "湖南省-长沙市-浏阳市"
        },
        {
            "id": "430200",
            "name": "株洲市",
            "parent_id": "430000",
            "level": "2",
            "full_name": "湖南省-株洲市"
        },
        {
            "id": "430201",
            "name": "市辖区",
            "parent_id": "430200",
            "level": "3",
            "full_name": "湖南省-株洲市-市辖区"
        },
        {
            "id": "430202",
            "name": "荷塘区",
            "parent_id": "430200",
            "level": "3",
            "full_name": "湖南省-株洲市-荷塘区"
        },
        {
            "id": "430203",
            "name": "芦淞区",
            "parent_id": "430200",
            "level": "3",
            "full_name": "湖南省-株洲市-芦淞区"
        },
        {
            "id": "430204",
            "name": "石峰区",
            "parent_id": "430200",
            "level": "3",
            "full_name": "湖南省-株洲市-石峰区"
        },
        {
            "id": "430211",
            "name": "天元区",
            "parent_id": "430200",
            "level": "3",
            "full_name": "湖南省-株洲市-天元区"
        },
        {
            "id": "430221",
            "name": "株洲县",
            "parent_id": "430200",
            "level": "3",
            "full_name": "湖南省-株洲市-株洲县"
        },
        {
            "id": "430223",
            "name": "攸县",
            "parent_id": "430200",
            "level": "3",
            "full_name": "湖南省-株洲市-攸县"
        },
        {
            "id": "430224",
            "name": "茶陵县",
            "parent_id": "430200",
            "level": "3",
            "full_name": "湖南省-株洲市-茶陵县"
        },
        {
            "id": "430225",
            "name": "炎陵县",
            "parent_id": "430200",
            "level": "3",
            "full_name": "湖南省-株洲市-炎陵县"
        },
        {
            "id": "430281",
            "name": "醴陵市",
            "parent_id": "430200",
            "level": "3",
            "full_name": "湖南省-株洲市-醴陵市"
        },
        {
            "id": "430300",
            "name": "湘潭市",
            "parent_id": "430000",
            "level": "2",
            "full_name": "湖南省-湘潭市"
        },
        {
            "id": "430301",
            "name": "市辖区",
            "parent_id": "430300",
            "level": "3",
            "full_name": "湖南省-湘潭市-市辖区"
        },
        {
            "id": "430302",
            "name": "雨湖区",
            "parent_id": "430300",
            "level": "3",
            "full_name": "湖南省-湘潭市-雨湖区"
        },
        {
            "id": "430304",
            "name": "岳塘区",
            "parent_id": "430300",
            "level": "3",
            "full_name": "湖南省-湘潭市-岳塘区"
        },
        {
            "id": "430321",
            "name": "湘潭县",
            "parent_id": "430300",
            "level": "3",
            "full_name": "湖南省-湘潭市-湘潭县"
        },
        {
            "id": "430381",
            "name": "湘乡市",
            "parent_id": "430300",
            "level": "3",
            "full_name": "湖南省-湘潭市-湘乡市"
        },
        {
            "id": "430382",
            "name": "韶山市",
            "parent_id": "430300",
            "level": "3",
            "full_name": "湖南省-湘潭市-韶山市"
        },
        {
            "id": "430400",
            "name": "衡阳市",
            "parent_id": "430000",
            "level": "2",
            "full_name": "湖南省-衡阳市"
        },
        {
            "id": "430401",
            "name": "市辖区",
            "parent_id": "430400",
            "level": "3",
            "full_name": "湖南省-衡阳市-市辖区"
        },
        {
            "id": "430405",
            "name": "珠晖区",
            "parent_id": "430400",
            "level": "3",
            "full_name": "湖南省-衡阳市-珠晖区"
        },
        {
            "id": "430406",
            "name": "雁峰区",
            "parent_id": "430400",
            "level": "3",
            "full_name": "湖南省-衡阳市-雁峰区"
        },
        {
            "id": "430407",
            "name": "石鼓区",
            "parent_id": "430400",
            "level": "3",
            "full_name": "湖南省-衡阳市-石鼓区"
        },
        {
            "id": "430408",
            "name": "蒸湘区",
            "parent_id": "430400",
            "level": "3",
            "full_name": "湖南省-衡阳市-蒸湘区"
        },
        {
            "id": "430412",
            "name": "南岳区",
            "parent_id": "430400",
            "level": "3",
            "full_name": "湖南省-衡阳市-南岳区"
        },
        {
            "id": "430421",
            "name": "衡阳县",
            "parent_id": "430400",
            "level": "3",
            "full_name": "湖南省-衡阳市-衡阳县"
        },
        {
            "id": "430422",
            "name": "衡南县",
            "parent_id": "430400",
            "level": "3",
            "full_name": "湖南省-衡阳市-衡南县"
        },
        {
            "id": "430423",
            "name": "衡山县",
            "parent_id": "430400",
            "level": "3",
            "full_name": "湖南省-衡阳市-衡山县"
        },
        {
            "id": "430424",
            "name": "衡东县",
            "parent_id": "430400",
            "level": "3",
            "full_name": "湖南省-衡阳市-衡东县"
        },
        {
            "id": "430426",
            "name": "祁东县",
            "parent_id": "430400",
            "level": "3",
            "full_name": "湖南省-衡阳市-祁东县"
        },
        {
            "id": "430481",
            "name": "耒阳市",
            "parent_id": "430400",
            "level": "3",
            "full_name": "湖南省-衡阳市-耒阳市"
        },
        {
            "id": "430482",
            "name": "常宁市",
            "parent_id": "430400",
            "level": "3",
            "full_name": "湖南省-衡阳市-常宁市"
        },
        {
            "id": "430500",
            "name": "邵阳市",
            "parent_id": "430000",
            "level": "2",
            "full_name": "湖南省-邵阳市"
        },
        {
            "id": "430501",
            "name": "市辖区",
            "parent_id": "430500",
            "level": "3",
            "full_name": "湖南省-邵阳市-市辖区"
        },
        {
            "id": "430502",
            "name": "双清区",
            "parent_id": "430500",
            "level": "3",
            "full_name": "湖南省-邵阳市-双清区"
        },
        {
            "id": "430503",
            "name": "大祥区",
            "parent_id": "430500",
            "level": "3",
            "full_name": "湖南省-邵阳市-大祥区"
        },
        {
            "id": "430511",
            "name": "北塔区",
            "parent_id": "430500",
            "level": "3",
            "full_name": "湖南省-邵阳市-北塔区"
        },
        {
            "id": "430521",
            "name": "邵东县",
            "parent_id": "430500",
            "level": "3",
            "full_name": "湖南省-邵阳市-邵东县"
        },
        {
            "id": "430522",
            "name": "新邵县",
            "parent_id": "430500",
            "level": "3",
            "full_name": "湖南省-邵阳市-新邵县"
        },
        {
            "id": "430523",
            "name": "邵阳县",
            "parent_id": "430500",
            "level": "3",
            "full_name": "湖南省-邵阳市-邵阳县"
        },
        {
            "id": "430524",
            "name": "隆回县",
            "parent_id": "430500",
            "level": "3",
            "full_name": "湖南省-邵阳市-隆回县"
        },
        {
            "id": "430525",
            "name": "洞口县",
            "parent_id": "430500",
            "level": "3",
            "full_name": "湖南省-邵阳市-洞口县"
        },
        {
            "id": "430527",
            "name": "绥宁县",
            "parent_id": "430500",
            "level": "3",
            "full_name": "湖南省-邵阳市-绥宁县"
        },
        {
            "id": "430528",
            "name": "新宁县",
            "parent_id": "430500",
            "level": "3",
            "full_name": "湖南省-邵阳市-新宁县"
        },
        {
            "id": "430529",
            "name": "城步苗族自治县",
            "parent_id": "430500",
            "level": "3",
            "full_name": "湖南省-邵阳市-城步苗族自治县"
        },
        {
            "id": "430581",
            "name": "武冈市",
            "parent_id": "430500",
            "level": "3",
            "full_name": "湖南省-邵阳市-武冈市"
        },
        {
            "id": "430600",
            "name": "岳阳市",
            "parent_id": "430000",
            "level": "2",
            "full_name": "湖南省-岳阳市"
        },
        {
            "id": "430601",
            "name": "市辖区",
            "parent_id": "430600",
            "level": "3",
            "full_name": "湖南省-岳阳市-市辖区"
        },
        {
            "id": "430602",
            "name": "岳阳楼区",
            "parent_id": "430600",
            "level": "3",
            "full_name": "湖南省-岳阳市-岳阳楼区"
        },
        {
            "id": "430603",
            "name": "云溪区",
            "parent_id": "430600",
            "level": "3",
            "full_name": "湖南省-岳阳市-云溪区"
        },
        {
            "id": "430611",
            "name": "君山区",
            "parent_id": "430600",
            "level": "3",
            "full_name": "湖南省-岳阳市-君山区"
        },
        {
            "id": "430621",
            "name": "岳阳县",
            "parent_id": "430600",
            "level": "3",
            "full_name": "湖南省-岳阳市-岳阳县"
        },
        {
            "id": "430623",
            "name": "华容县",
            "parent_id": "430600",
            "level": "3",
            "full_name": "湖南省-岳阳市-华容县"
        },
        {
            "id": "430624",
            "name": "湘阴县",
            "parent_id": "430600",
            "level": "3",
            "full_name": "湖南省-岳阳市-湘阴县"
        },
        {
            "id": "430626",
            "name": "平江县",
            "parent_id": "430600",
            "level": "3",
            "full_name": "湖南省-岳阳市-平江县"
        },
        {
            "id": "430681",
            "name": "汨罗市",
            "parent_id": "430600",
            "level": "3",
            "full_name": "湖南省-岳阳市-汨罗市"
        },
        {
            "id": "430682",
            "name": "临湘市",
            "parent_id": "430600",
            "level": "3",
            "full_name": "湖南省-岳阳市-临湘市"
        },
        {
            "id": "430700",
            "name": "常德市",
            "parent_id": "430000",
            "level": "2",
            "full_name": "湖南省-常德市"
        },
        {
            "id": "430701",
            "name": "市辖区",
            "parent_id": "430700",
            "level": "3",
            "full_name": "湖南省-常德市-市辖区"
        },
        {
            "id": "430702",
            "name": "武陵区",
            "parent_id": "430700",
            "level": "3",
            "full_name": "湖南省-常德市-武陵区"
        },
        {
            "id": "430703",
            "name": "鼎城区",
            "parent_id": "430700",
            "level": "3",
            "full_name": "湖南省-常德市-鼎城区"
        },
        {
            "id": "430721",
            "name": "安乡县",
            "parent_id": "430700",
            "level": "3",
            "full_name": "湖南省-常德市-安乡县"
        },
        {
            "id": "430722",
            "name": "汉寿县",
            "parent_id": "430700",
            "level": "3",
            "full_name": "湖南省-常德市-汉寿县"
        },
        {
            "id": "430723",
            "name": "澧县",
            "parent_id": "430700",
            "level": "3",
            "full_name": "湖南省-常德市-澧县"
        },
        {
            "id": "430724",
            "name": "临澧县",
            "parent_id": "430700",
            "level": "3",
            "full_name": "湖南省-常德市-临澧县"
        },
        {
            "id": "430725",
            "name": "桃源县",
            "parent_id": "430700",
            "level": "3",
            "full_name": "湖南省-常德市-桃源县"
        },
        {
            "id": "430726",
            "name": "石门县",
            "parent_id": "430700",
            "level": "3",
            "full_name": "湖南省-常德市-石门县"
        },
        {
            "id": "430781",
            "name": "津市市",
            "parent_id": "430700",
            "level": "3",
            "full_name": "湖南省-常德市-津市市"
        },
        {
            "id": "430800",
            "name": "张家界市",
            "parent_id": "430000",
            "level": "2",
            "full_name": "湖南省-张家界市"
        },
        {
            "id": "430801",
            "name": "市辖区",
            "parent_id": "430800",
            "level": "3",
            "full_name": "湖南省-张家界市-市辖区"
        },
        {
            "id": "430802",
            "name": "永定区",
            "parent_id": "430800",
            "level": "3",
            "full_name": "湖南省-张家界市-永定区"
        },
        {
            "id": "430811",
            "name": "武陵源区",
            "parent_id": "430800",
            "level": "3",
            "full_name": "湖南省-张家界市-武陵源区"
        },
        {
            "id": "430821",
            "name": "慈利县",
            "parent_id": "430800",
            "level": "3",
            "full_name": "湖南省-张家界市-慈利县"
        },
        {
            "id": "430822",
            "name": "桑植县",
            "parent_id": "430800",
            "level": "3",
            "full_name": "湖南省-张家界市-桑植县"
        },
        {
            "id": "430900",
            "name": "益阳市",
            "parent_id": "430000",
            "level": "2",
            "full_name": "湖南省-益阳市"
        },
        {
            "id": "430901",
            "name": "市辖区",
            "parent_id": "430900",
            "level": "3",
            "full_name": "湖南省-益阳市-市辖区"
        },
        {
            "id": "430902",
            "name": "资阳区",
            "parent_id": "430900",
            "level": "3",
            "full_name": "湖南省-益阳市-资阳区"
        },
        {
            "id": "430903",
            "name": "赫山区",
            "parent_id": "430900",
            "level": "3",
            "full_name": "湖南省-益阳市-赫山区"
        },
        {
            "id": "430921",
            "name": "南县",
            "parent_id": "430900",
            "level": "3",
            "full_name": "湖南省-益阳市-南县"
        },
        {
            "id": "430922",
            "name": "桃江县",
            "parent_id": "430900",
            "level": "3",
            "full_name": "湖南省-益阳市-桃江县"
        },
        {
            "id": "430923",
            "name": "安化县",
            "parent_id": "430900",
            "level": "3",
            "full_name": "湖南省-益阳市-安化县"
        },
        {
            "id": "430981",
            "name": "沅江市",
            "parent_id": "430900",
            "level": "3",
            "full_name": "湖南省-益阳市-沅江市"
        },
        {
            "id": "431000",
            "name": "郴州市",
            "parent_id": "430000",
            "level": "2",
            "full_name": "湖南省-郴州市"
        },
        {
            "id": "431001",
            "name": "市辖区",
            "parent_id": "431000",
            "level": "3",
            "full_name": "湖南省-郴州市-市辖区"
        },
        {
            "id": "431002",
            "name": "北湖区",
            "parent_id": "431000",
            "level": "3",
            "full_name": "湖南省-郴州市-北湖区"
        },
        {
            "id": "431003",
            "name": "苏仙区",
            "parent_id": "431000",
            "level": "3",
            "full_name": "湖南省-郴州市-苏仙区"
        },
        {
            "id": "431021",
            "name": "桂阳县",
            "parent_id": "431000",
            "level": "3",
            "full_name": "湖南省-郴州市-桂阳县"
        },
        {
            "id": "431022",
            "name": "宜章县",
            "parent_id": "431000",
            "level": "3",
            "full_name": "湖南省-郴州市-宜章县"
        },
        {
            "id": "431023",
            "name": "永兴县",
            "parent_id": "431000",
            "level": "3",
            "full_name": "湖南省-郴州市-永兴县"
        },
        {
            "id": "431024",
            "name": "嘉禾县",
            "parent_id": "431000",
            "level": "3",
            "full_name": "湖南省-郴州市-嘉禾县"
        },
        {
            "id": "431025",
            "name": "临武县",
            "parent_id": "431000",
            "level": "3",
            "full_name": "湖南省-郴州市-临武县"
        },
        {
            "id": "431026",
            "name": "汝城县",
            "parent_id": "431000",
            "level": "3",
            "full_name": "湖南省-郴州市-汝城县"
        },
        {
            "id": "431027",
            "name": "桂东县",
            "parent_id": "431000",
            "level": "3",
            "full_name": "湖南省-郴州市-桂东县"
        },
        {
            "id": "431028",
            "name": "安仁县",
            "parent_id": "431000",
            "level": "3",
            "full_name": "湖南省-郴州市-安仁县"
        },
        {
            "id": "431081",
            "name": "资兴市",
            "parent_id": "431000",
            "level": "3",
            "full_name": "湖南省-郴州市-资兴市"
        },
        {
            "id": "431100",
            "name": "永州市",
            "parent_id": "430000",
            "level": "2",
            "full_name": "湖南省-永州市"
        },
        {
            "id": "431101",
            "name": "市辖区",
            "parent_id": "431100",
            "level": "3",
            "full_name": "湖南省-永州市-市辖区"
        },
        {
            "id": "431102",
            "name": "零陵区",
            "parent_id": "431100",
            "level": "3",
            "full_name": "湖南省-永州市-零陵区"
        },
        {
            "id": "431103",
            "name": "冷水滩区",
            "parent_id": "431100",
            "level": "3",
            "full_name": "湖南省-永州市-冷水滩区"
        },
        {
            "id": "431121",
            "name": "祁阳县",
            "parent_id": "431100",
            "level": "3",
            "full_name": "湖南省-永州市-祁阳县"
        },
        {
            "id": "431122",
            "name": "东安县",
            "parent_id": "431100",
            "level": "3",
            "full_name": "湖南省-永州市-东安县"
        },
        {
            "id": "431123",
            "name": "双牌县",
            "parent_id": "431100",
            "level": "3",
            "full_name": "湖南省-永州市-双牌县"
        },
        {
            "id": "431124",
            "name": "道县",
            "parent_id": "431100",
            "level": "3",
            "full_name": "湖南省-永州市-道县"
        },
        {
            "id": "431125",
            "name": "江永县",
            "parent_id": "431100",
            "level": "3",
            "full_name": "湖南省-永州市-江永县"
        },
        {
            "id": "431126",
            "name": "宁远县",
            "parent_id": "431100",
            "level": "3",
            "full_name": "湖南省-永州市-宁远县"
        },
        {
            "id": "431127",
            "name": "蓝山县",
            "parent_id": "431100",
            "level": "3",
            "full_name": "湖南省-永州市-蓝山县"
        },
        {
            "id": "431128",
            "name": "新田县",
            "parent_id": "431100",
            "level": "3",
            "full_name": "湖南省-永州市-新田县"
        },
        {
            "id": "431129",
            "name": "江华瑶族自治县",
            "parent_id": "431100",
            "level": "3",
            "full_name": "湖南省-永州市-江华瑶族自治县"
        },
        {
            "id": "431200",
            "name": "怀化市",
            "parent_id": "430000",
            "level": "2",
            "full_name": "湖南省-怀化市"
        },
        {
            "id": "431201",
            "name": "市辖区",
            "parent_id": "431200",
            "level": "3",
            "full_name": "湖南省-怀化市-市辖区"
        },
        {
            "id": "431202",
            "name": "鹤城区",
            "parent_id": "431200",
            "level": "3",
            "full_name": "湖南省-怀化市-鹤城区"
        },
        {
            "id": "431221",
            "name": "中方县",
            "parent_id": "431200",
            "level": "3",
            "full_name": "湖南省-怀化市-中方县"
        },
        {
            "id": "431222",
            "name": "沅陵县",
            "parent_id": "431200",
            "level": "3",
            "full_name": "湖南省-怀化市-沅陵县"
        },
        {
            "id": "431223",
            "name": "辰溪县",
            "parent_id": "431200",
            "level": "3",
            "full_name": "湖南省-怀化市-辰溪县"
        },
        {
            "id": "431224",
            "name": "溆浦县",
            "parent_id": "431200",
            "level": "3",
            "full_name": "湖南省-怀化市-溆浦县"
        },
        {
            "id": "431225",
            "name": "会同县",
            "parent_id": "431200",
            "level": "3",
            "full_name": "湖南省-怀化市-会同县"
        },
        {
            "id": "431226",
            "name": "麻阳苗族自治县",
            "parent_id": "431200",
            "level": "3",
            "full_name": "湖南省-怀化市-麻阳苗族自治县"
        },
        {
            "id": "431227",
            "name": "新晃侗族自治县",
            "parent_id": "431200",
            "level": "3",
            "full_name": "湖南省-怀化市-新晃侗族自治县"
        },
        {
            "id": "431228",
            "name": "芷江侗族自治县",
            "parent_id": "431200",
            "level": "3",
            "full_name": "湖南省-怀化市-芷江侗族自治县"
        },
        {
            "id": "431229",
            "name": "靖州苗族侗族自治县",
            "parent_id": "431200",
            "level": "3",
            "full_name": "湖南省-怀化市-靖州苗族侗族自治县"
        },
        {
            "id": "431230",
            "name": "通道侗族自治县",
            "parent_id": "431200",
            "level": "3",
            "full_name": "湖南省-怀化市-通道侗族自治县"
        },
        {
            "id": "431281",
            "name": "洪江市",
            "parent_id": "431200",
            "level": "3",
            "full_name": "湖南省-怀化市-洪江市"
        },
        {
            "id": "431300",
            "name": "娄底市",
            "parent_id": "430000",
            "level": "2",
            "full_name": "湖南省-娄底市"
        },
        {
            "id": "431301",
            "name": "市辖区",
            "parent_id": "431300",
            "level": "3",
            "full_name": "湖南省-娄底市-市辖区"
        },
        {
            "id": "431302",
            "name": "娄星区",
            "parent_id": "431300",
            "level": "3",
            "full_name": "湖南省-娄底市-娄星区"
        },
        {
            "id": "431321",
            "name": "双峰县",
            "parent_id": "431300",
            "level": "3",
            "full_name": "湖南省-娄底市-双峰县"
        },
        {
            "id": "431322",
            "name": "新化县",
            "parent_id": "431300",
            "level": "3",
            "full_name": "湖南省-娄底市-新化县"
        },
        {
            "id": "431381",
            "name": "冷水江市",
            "parent_id": "431300",
            "level": "3",
            "full_name": "湖南省-娄底市-冷水江市"
        },
        {
            "id": "431382",
            "name": "涟源市",
            "parent_id": "431300",
            "level": "3",
            "full_name": "湖南省-娄底市-涟源市"
        },
        {
            "id": "433100",
            "name": "湘西土家族苗族自治州",
            "parent_id": "430000",
            "level": "2",
            "full_name": "湖南省-湘西土家族苗族自治州"
        },
        {
            "id": "433101",
            "name": "吉首市",
            "parent_id": "433100",
            "level": "3",
            "full_name": "湖南省-湘西土家族苗族自治州-吉首市"
        },
        {
            "id": "433122",
            "name": "泸溪县",
            "parent_id": "433100",
            "level": "3",
            "full_name": "湖南省-湘西土家族苗族自治州-泸溪县"
        },
        {
            "id": "433123",
            "name": "凤凰县",
            "parent_id": "433100",
            "level": "3",
            "full_name": "湖南省-湘西土家族苗族自治州-凤凰县"
        },
        {
            "id": "433124",
            "name": "花垣县",
            "parent_id": "433100",
            "level": "3",
            "full_name": "湖南省-湘西土家族苗族自治州-花垣县"
        },
        {
            "id": "433125",
            "name": "保靖县",
            "parent_id": "433100",
            "level": "3",
            "full_name": "湖南省-湘西土家族苗族自治州-保靖县"
        },
        {
            "id": "433126",
            "name": "古丈县",
            "parent_id": "433100",
            "level": "3",
            "full_name": "湖南省-湘西土家族苗族自治州-古丈县"
        },
        {
            "id": "433127",
            "name": "永顺县",
            "parent_id": "433100",
            "level": "3",
            "full_name": "湖南省-湘西土家族苗族自治州-永顺县"
        },
        {
            "id": "433130",
            "name": "龙山县",
            "parent_id": "433100",
            "level": "3",
            "full_name": "湖南省-湘西土家族苗族自治州-龙山县"
        },
        {
            "id": "440000",
            "name": "广东省",
            "parent_id": "0",
            "level": "1",
            "full_name": "广东省"
        },
        {
            "id": "440100",
            "name": "广州市",
            "parent_id": "440000",
            "level": "2",
            "full_name": "广东省-广州市"
        },
        {
            "id": "440101",
            "name": "市辖区",
            "parent_id": "440100",
            "level": "3",
            "full_name": "广东省-广州市-市辖区"
        },
        {
            "id": "440103",
            "name": "荔湾区",
            "parent_id": "440100",
            "level": "3",
            "full_name": "广东省-广州市-荔湾区"
        },
        {
            "id": "440104",
            "name": "越秀区",
            "parent_id": "440100",
            "level": "3",
            "full_name": "广东省-广州市-越秀区"
        },
        {
            "id": "440105",
            "name": "海珠区",
            "parent_id": "440100",
            "level": "3",
            "full_name": "广东省-广州市-海珠区"
        },
        {
            "id": "440106",
            "name": "天河区",
            "parent_id": "440100",
            "level": "3",
            "full_name": "广东省-广州市-天河区"
        },
        {
            "id": "440111",
            "name": "白云区",
            "parent_id": "440100",
            "level": "3",
            "full_name": "广东省-广州市-白云区"
        },
        {
            "id": "440112",
            "name": "黄埔区",
            "parent_id": "440100",
            "level": "3",
            "full_name": "广东省-广州市-黄埔区"
        },
        {
            "id": "440113",
            "name": "番禺区",
            "parent_id": "440100",
            "level": "3",
            "full_name": "广东省-广州市-番禺区"
        },
        {
            "id": "440114",
            "name": "花都区",
            "parent_id": "440100",
            "level": "3",
            "full_name": "广东省-广州市-花都区"
        },
        {
            "id": "440115",
            "name": "南沙区",
            "parent_id": "440100",
            "level": "3",
            "full_name": "广东省-广州市-南沙区"
        },
        {
            "id": "440117",
            "name": "从化区",
            "parent_id": "440100",
            "level": "3",
            "full_name": "广东省-广州市-从化区"
        },
        {
            "id": "440118",
            "name": "增城区",
            "parent_id": "440100",
            "level": "3",
            "full_name": "广东省-广州市-增城区"
        },
        {
            "id": "440200",
            "name": "韶关市",
            "parent_id": "440000",
            "level": "2",
            "full_name": "广东省-韶关市"
        },
        {
            "id": "440201",
            "name": "市辖区",
            "parent_id": "440200",
            "level": "3",
            "full_name": "广东省-韶关市-市辖区"
        },
        {
            "id": "440203",
            "name": "武江区",
            "parent_id": "440200",
            "level": "3",
            "full_name": "广东省-韶关市-武江区"
        },
        {
            "id": "440204",
            "name": "浈江区",
            "parent_id": "440200",
            "level": "3",
            "full_name": "广东省-韶关市-浈江区"
        },
        {
            "id": "440205",
            "name": "曲江区",
            "parent_id": "440200",
            "level": "3",
            "full_name": "广东省-韶关市-曲江区"
        },
        {
            "id": "440222",
            "name": "始兴县",
            "parent_id": "440200",
            "level": "3",
            "full_name": "广东省-韶关市-始兴县"
        },
        {
            "id": "440224",
            "name": "仁化县",
            "parent_id": "440200",
            "level": "3",
            "full_name": "广东省-韶关市-仁化县"
        },
        {
            "id": "440229",
            "name": "翁源县",
            "parent_id": "440200",
            "level": "3",
            "full_name": "广东省-韶关市-翁源县"
        },
        {
            "id": "440232",
            "name": "乳源瑶族自治县",
            "parent_id": "440200",
            "level": "3",
            "full_name": "广东省-韶关市-乳源瑶族自治县"
        },
        {
            "id": "440233",
            "name": "新丰县",
            "parent_id": "440200",
            "level": "3",
            "full_name": "广东省-韶关市-新丰县"
        },
        {
            "id": "440281",
            "name": "乐昌市",
            "parent_id": "440200",
            "level": "3",
            "full_name": "广东省-韶关市-乐昌市"
        },
        {
            "id": "440282",
            "name": "南雄市",
            "parent_id": "440200",
            "level": "3",
            "full_name": "广东省-韶关市-南雄市"
        },
        {
            "id": "440300",
            "name": "深圳市",
            "parent_id": "440000",
            "level": "2",
            "full_name": "广东省-深圳市"
        },
        {
            "id": "440301",
            "name": "市辖区",
            "parent_id": "440300",
            "level": "3",
            "full_name": "广东省-深圳市-市辖区"
        },
        {
            "id": "440303",
            "name": "罗湖区",
            "parent_id": "440300",
            "level": "3",
            "full_name": "广东省-深圳市-罗湖区"
        },
        {
            "id": "440304",
            "name": "福田区",
            "parent_id": "440300",
            "level": "3",
            "full_name": "广东省-深圳市-福田区"
        },
        {
            "id": "440305",
            "name": "南山区",
            "parent_id": "440300",
            "level": "3",
            "full_name": "广东省-深圳市-南山区"
        },
        {
            "id": "440306",
            "name": "宝安区",
            "parent_id": "440300",
            "level": "3",
            "full_name": "广东省-深圳市-宝安区"
        },
        {
            "id": "440307",
            "name": "龙岗区",
            "parent_id": "440300",
            "level": "3",
            "full_name": "广东省-深圳市-龙岗区"
        },
        {
            "id": "440308",
            "name": "盐田区",
            "parent_id": "440300",
            "level": "3",
            "full_name": "广东省-深圳市-盐田区"
        },
        {
            "id": "440400",
            "name": "珠海市",
            "parent_id": "440000",
            "level": "2",
            "full_name": "广东省-珠海市"
        },
        {
            "id": "440401",
            "name": "市辖区",
            "parent_id": "440400",
            "level": "3",
            "full_name": "广东省-珠海市-市辖区"
        },
        {
            "id": "440402",
            "name": "香洲区",
            "parent_id": "440400",
            "level": "3",
            "full_name": "广东省-珠海市-香洲区"
        },
        {
            "id": "440403",
            "name": "斗门区",
            "parent_id": "440400",
            "level": "3",
            "full_name": "广东省-珠海市-斗门区"
        },
        {
            "id": "440404",
            "name": "金湾区",
            "parent_id": "440400",
            "level": "3",
            "full_name": "广东省-珠海市-金湾区"
        },
        {
            "id": "440500",
            "name": "汕头市",
            "parent_id": "440000",
            "level": "2",
            "full_name": "广东省-汕头市"
        },
        {
            "id": "440501",
            "name": "市辖区",
            "parent_id": "440500",
            "level": "3",
            "full_name": "广东省-汕头市-市辖区"
        },
        {
            "id": "440507",
            "name": "龙湖区",
            "parent_id": "440500",
            "level": "3",
            "full_name": "广东省-汕头市-龙湖区"
        },
        {
            "id": "440511",
            "name": "金平区",
            "parent_id": "440500",
            "level": "3",
            "full_name": "广东省-汕头市-金平区"
        },
        {
            "id": "440512",
            "name": "濠江区",
            "parent_id": "440500",
            "level": "3",
            "full_name": "广东省-汕头市-濠江区"
        },
        {
            "id": "440513",
            "name": "潮阳区",
            "parent_id": "440500",
            "level": "3",
            "full_name": "广东省-汕头市-潮阳区"
        },
        {
            "id": "440514",
            "name": "潮南区",
            "parent_id": "440500",
            "level": "3",
            "full_name": "广东省-汕头市-潮南区"
        },
        {
            "id": "440515",
            "name": "澄海区",
            "parent_id": "440500",
            "level": "3",
            "full_name": "广东省-汕头市-澄海区"
        },
        {
            "id": "440523",
            "name": "南澳县",
            "parent_id": "440500",
            "level": "3",
            "full_name": "广东省-汕头市-南澳县"
        },
        {
            "id": "440600",
            "name": "佛山市",
            "parent_id": "440000",
            "level": "2",
            "full_name": "广东省-佛山市"
        },
        {
            "id": "440601",
            "name": "市辖区",
            "parent_id": "440600",
            "level": "3",
            "full_name": "广东省-佛山市-市辖区"
        },
        {
            "id": "440604",
            "name": "禅城区",
            "parent_id": "440600",
            "level": "3",
            "full_name": "广东省-佛山市-禅城区"
        },
        {
            "id": "440605",
            "name": "南海区",
            "parent_id": "440600",
            "level": "3",
            "full_name": "广东省-佛山市-南海区"
        },
        {
            "id": "440606",
            "name": "顺德区",
            "parent_id": "440600",
            "level": "3",
            "full_name": "广东省-佛山市-顺德区"
        },
        {
            "id": "440607",
            "name": "三水区",
            "parent_id": "440600",
            "level": "3",
            "full_name": "广东省-佛山市-三水区"
        },
        {
            "id": "440608",
            "name": "高明区",
            "parent_id": "440600",
            "level": "3",
            "full_name": "广东省-佛山市-高明区"
        },
        {
            "id": "440700",
            "name": "江门市",
            "parent_id": "440000",
            "level": "2",
            "full_name": "广东省-江门市"
        },
        {
            "id": "440701",
            "name": "市辖区",
            "parent_id": "440700",
            "level": "3",
            "full_name": "广东省-江门市-市辖区"
        },
        {
            "id": "440703",
            "name": "蓬江区",
            "parent_id": "440700",
            "level": "3",
            "full_name": "广东省-江门市-蓬江区"
        },
        {
            "id": "440704",
            "name": "江海区",
            "parent_id": "440700",
            "level": "3",
            "full_name": "广东省-江门市-江海区"
        },
        {
            "id": "440705",
            "name": "新会区",
            "parent_id": "440700",
            "level": "3",
            "full_name": "广东省-江门市-新会区"
        },
        {
            "id": "440781",
            "name": "台山市",
            "parent_id": "440700",
            "level": "3",
            "full_name": "广东省-江门市-台山市"
        },
        {
            "id": "440783",
            "name": "开平市",
            "parent_id": "440700",
            "level": "3",
            "full_name": "广东省-江门市-开平市"
        },
        {
            "id": "440784",
            "name": "鹤山市",
            "parent_id": "440700",
            "level": "3",
            "full_name": "广东省-江门市-鹤山市"
        },
        {
            "id": "440785",
            "name": "恩平市",
            "parent_id": "440700",
            "level": "3",
            "full_name": "广东省-江门市-恩平市"
        },
        {
            "id": "440800",
            "name": "湛江市",
            "parent_id": "440000",
            "level": "2",
            "full_name": "广东省-湛江市"
        },
        {
            "id": "440801",
            "name": "市辖区",
            "parent_id": "440800",
            "level": "3",
            "full_name": "广东省-湛江市-市辖区"
        },
        {
            "id": "440802",
            "name": "赤坎区",
            "parent_id": "440800",
            "level": "3",
            "full_name": "广东省-湛江市-赤坎区"
        },
        {
            "id": "440803",
            "name": "霞山区",
            "parent_id": "440800",
            "level": "3",
            "full_name": "广东省-湛江市-霞山区"
        },
        {
            "id": "440804",
            "name": "坡头区",
            "parent_id": "440800",
            "level": "3",
            "full_name": "广东省-湛江市-坡头区"
        },
        {
            "id": "440811",
            "name": "麻章区",
            "parent_id": "440800",
            "level": "3",
            "full_name": "广东省-湛江市-麻章区"
        },
        {
            "id": "440823",
            "name": "遂溪县",
            "parent_id": "440800",
            "level": "3",
            "full_name": "广东省-湛江市-遂溪县"
        },
        {
            "id": "440825",
            "name": "徐闻县",
            "parent_id": "440800",
            "level": "3",
            "full_name": "广东省-湛江市-徐闻县"
        },
        {
            "id": "440881",
            "name": "廉江市",
            "parent_id": "440800",
            "level": "3",
            "full_name": "广东省-湛江市-廉江市"
        },
        {
            "id": "440882",
            "name": "雷州市",
            "parent_id": "440800",
            "level": "3",
            "full_name": "广东省-湛江市-雷州市"
        },
        {
            "id": "440883",
            "name": "吴川市",
            "parent_id": "440800",
            "level": "3",
            "full_name": "广东省-湛江市-吴川市"
        },
        {
            "id": "440900",
            "name": "茂名市",
            "parent_id": "440000",
            "level": "2",
            "full_name": "广东省-茂名市"
        },
        {
            "id": "440901",
            "name": "市辖区",
            "parent_id": "440900",
            "level": "3",
            "full_name": "广东省-茂名市-市辖区"
        },
        {
            "id": "440902",
            "name": "茂南区",
            "parent_id": "440900",
            "level": "3",
            "full_name": "广东省-茂名市-茂南区"
        },
        {
            "id": "440904",
            "name": "电白区",
            "parent_id": "440900",
            "level": "3",
            "full_name": "广东省-茂名市-电白区"
        },
        {
            "id": "440981",
            "name": "高州市",
            "parent_id": "440900",
            "level": "3",
            "full_name": "广东省-茂名市-高州市"
        },
        {
            "id": "440982",
            "name": "化州市",
            "parent_id": "440900",
            "level": "3",
            "full_name": "广东省-茂名市-化州市"
        },
        {
            "id": "440983",
            "name": "信宜市",
            "parent_id": "440900",
            "level": "3",
            "full_name": "广东省-茂名市-信宜市"
        },
        {
            "id": "441200",
            "name": "肇庆市",
            "parent_id": "440000",
            "level": "2",
            "full_name": "广东省-肇庆市"
        },
        {
            "id": "441201",
            "name": "市辖区",
            "parent_id": "441200",
            "level": "3",
            "full_name": "广东省-肇庆市-市辖区"
        },
        {
            "id": "441202",
            "name": "端州区",
            "parent_id": "441200",
            "level": "3",
            "full_name": "广东省-肇庆市-端州区"
        },
        {
            "id": "441203",
            "name": "鼎湖区",
            "parent_id": "441200",
            "level": "3",
            "full_name": "广东省-肇庆市-鼎湖区"
        },
        {
            "id": "441204",
            "name": "高要区",
            "parent_id": "441200",
            "level": "3",
            "full_name": "广东省-肇庆市-高要区"
        },
        {
            "id": "441223",
            "name": "广宁县",
            "parent_id": "441200",
            "level": "3",
            "full_name": "广东省-肇庆市-广宁县"
        },
        {
            "id": "441224",
            "name": "怀集县",
            "parent_id": "441200",
            "level": "3",
            "full_name": "广东省-肇庆市-怀集县"
        },
        {
            "id": "441225",
            "name": "封开县",
            "parent_id": "441200",
            "level": "3",
            "full_name": "广东省-肇庆市-封开县"
        },
        {
            "id": "441226",
            "name": "德庆县",
            "parent_id": "441200",
            "level": "3",
            "full_name": "广东省-肇庆市-德庆县"
        },
        {
            "id": "441284",
            "name": "四会市",
            "parent_id": "441200",
            "level": "3",
            "full_name": "广东省-肇庆市-四会市"
        },
        {
            "id": "441300",
            "name": "惠州市",
            "parent_id": "440000",
            "level": "2",
            "full_name": "广东省-惠州市"
        },
        {
            "id": "441301",
            "name": "市辖区",
            "parent_id": "441300",
            "level": "3",
            "full_name": "广东省-惠州市-市辖区"
        },
        {
            "id": "441302",
            "name": "惠城区",
            "parent_id": "441300",
            "level": "3",
            "full_name": "广东省-惠州市-惠城区"
        },
        {
            "id": "441303",
            "name": "惠阳区",
            "parent_id": "441300",
            "level": "3",
            "full_name": "广东省-惠州市-惠阳区"
        },
        {
            "id": "441322",
            "name": "博罗县",
            "parent_id": "441300",
            "level": "3",
            "full_name": "广东省-惠州市-博罗县"
        },
        {
            "id": "441323",
            "name": "惠东县",
            "parent_id": "441300",
            "level": "3",
            "full_name": "广东省-惠州市-惠东县"
        },
        {
            "id": "441324",
            "name": "龙门县",
            "parent_id": "441300",
            "level": "3",
            "full_name": "广东省-惠州市-龙门县"
        },
        {
            "id": "441400",
            "name": "梅州市",
            "parent_id": "440000",
            "level": "2",
            "full_name": "广东省-梅州市"
        },
        {
            "id": "441401",
            "name": "市辖区",
            "parent_id": "441400",
            "level": "3",
            "full_name": "广东省-梅州市-市辖区"
        },
        {
            "id": "441402",
            "name": "梅江区",
            "parent_id": "441400",
            "level": "3",
            "full_name": "广东省-梅州市-梅江区"
        },
        {
            "id": "441403",
            "name": "梅县区",
            "parent_id": "441400",
            "level": "3",
            "full_name": "广东省-梅州市-梅县区"
        },
        {
            "id": "441422",
            "name": "大埔县",
            "parent_id": "441400",
            "level": "3",
            "full_name": "广东省-梅州市-大埔县"
        },
        {
            "id": "441423",
            "name": "丰顺县",
            "parent_id": "441400",
            "level": "3",
            "full_name": "广东省-梅州市-丰顺县"
        },
        {
            "id": "441424",
            "name": "五华县",
            "parent_id": "441400",
            "level": "3",
            "full_name": "广东省-梅州市-五华县"
        },
        {
            "id": "441426",
            "name": "平远县",
            "parent_id": "441400",
            "level": "3",
            "full_name": "广东省-梅州市-平远县"
        },
        {
            "id": "441427",
            "name": "蕉岭县",
            "parent_id": "441400",
            "level": "3",
            "full_name": "广东省-梅州市-蕉岭县"
        },
        {
            "id": "441481",
            "name": "兴宁市",
            "parent_id": "441400",
            "level": "3",
            "full_name": "广东省-梅州市-兴宁市"
        },
        {
            "id": "441500",
            "name": "汕尾市",
            "parent_id": "440000",
            "level": "2",
            "full_name": "广东省-汕尾市"
        },
        {
            "id": "441501",
            "name": "市辖区",
            "parent_id": "441500",
            "level": "3",
            "full_name": "广东省-汕尾市-市辖区"
        },
        {
            "id": "441502",
            "name": "城区",
            "parent_id": "441500",
            "level": "3",
            "full_name": "广东省-汕尾市-城区"
        },
        {
            "id": "441521",
            "name": "海丰县",
            "parent_id": "441500",
            "level": "3",
            "full_name": "广东省-汕尾市-海丰县"
        },
        {
            "id": "441523",
            "name": "陆河县",
            "parent_id": "441500",
            "level": "3",
            "full_name": "广东省-汕尾市-陆河县"
        },
        {
            "id": "441581",
            "name": "陆丰市",
            "parent_id": "441500",
            "level": "3",
            "full_name": "广东省-汕尾市-陆丰市"
        },
        {
            "id": "441600",
            "name": "河源市",
            "parent_id": "440000",
            "level": "2",
            "full_name": "广东省-河源市"
        },
        {
            "id": "441601",
            "name": "市辖区",
            "parent_id": "441600",
            "level": "3",
            "full_name": "广东省-河源市-市辖区"
        },
        {
            "id": "441602",
            "name": "源城区",
            "parent_id": "441600",
            "level": "3",
            "full_name": "广东省-河源市-源城区"
        },
        {
            "id": "441621",
            "name": "紫金县",
            "parent_id": "441600",
            "level": "3",
            "full_name": "广东省-河源市-紫金县"
        },
        {
            "id": "441622",
            "name": "龙川县",
            "parent_id": "441600",
            "level": "3",
            "full_name": "广东省-河源市-龙川县"
        },
        {
            "id": "441623",
            "name": "连平县",
            "parent_id": "441600",
            "level": "3",
            "full_name": "广东省-河源市-连平县"
        },
        {
            "id": "441624",
            "name": "和平县",
            "parent_id": "441600",
            "level": "3",
            "full_name": "广东省-河源市-和平县"
        },
        {
            "id": "441625",
            "name": "东源县",
            "parent_id": "441600",
            "level": "3",
            "full_name": "广东省-河源市-东源县"
        },
        {
            "id": "441700",
            "name": "阳江市",
            "parent_id": "440000",
            "level": "2",
            "full_name": "广东省-阳江市"
        },
        {
            "id": "441701",
            "name": "市辖区",
            "parent_id": "441700",
            "level": "3",
            "full_name": "广东省-阳江市-市辖区"
        },
        {
            "id": "441702",
            "name": "江城区",
            "parent_id": "441700",
            "level": "3",
            "full_name": "广东省-阳江市-江城区"
        },
        {
            "id": "441704",
            "name": "阳东区",
            "parent_id": "441700",
            "level": "3",
            "full_name": "广东省-阳江市-阳东区"
        },
        {
            "id": "441721",
            "name": "阳西县",
            "parent_id": "441700",
            "level": "3",
            "full_name": "广东省-阳江市-阳西县"
        },
        {
            "id": "441781",
            "name": "阳春市",
            "parent_id": "441700",
            "level": "3",
            "full_name": "广东省-阳江市-阳春市"
        },
        {
            "id": "441800",
            "name": "清远市",
            "parent_id": "440000",
            "level": "2",
            "full_name": "广东省-清远市"
        },
        {
            "id": "441801",
            "name": "市辖区",
            "parent_id": "441800",
            "level": "3",
            "full_name": "广东省-清远市-市辖区"
        },
        {
            "id": "441802",
            "name": "清城区",
            "parent_id": "441800",
            "level": "3",
            "full_name": "广东省-清远市-清城区"
        },
        {
            "id": "441803",
            "name": "清新区",
            "parent_id": "441800",
            "level": "3",
            "full_name": "广东省-清远市-清新区"
        },
        {
            "id": "441821",
            "name": "佛冈县",
            "parent_id": "441800",
            "level": "3",
            "full_name": "广东省-清远市-佛冈县"
        },
        {
            "id": "441823",
            "name": "阳山县",
            "parent_id": "441800",
            "level": "3",
            "full_name": "广东省-清远市-阳山县"
        },
        {
            "id": "441825",
            "name": "连山壮族瑶族自治县",
            "parent_id": "441800",
            "level": "3",
            "full_name": "广东省-清远市-连山壮族瑶族自治县"
        },
        {
            "id": "441826",
            "name": "连南瑶族自治县",
            "parent_id": "441800",
            "level": "3",
            "full_name": "广东省-清远市-连南瑶族自治县"
        },
        {
            "id": "441881",
            "name": "英德市",
            "parent_id": "441800",
            "level": "3",
            "full_name": "广东省-清远市-英德市"
        },
        {
            "id": "441882",
            "name": "连州市",
            "parent_id": "441800",
            "level": "3",
            "full_name": "广东省-清远市-连州市"
        },
        {
            "id": "441900",
            "name": "东莞市",
            "parent_id": "440000",
            "level": "2",
            "full_name": "广东省-东莞市"
        },
        {
            "id": "441901",
            "name": "市辖区",
            "parent_id": "441900",
            "level": "3",
            "full_name": "广东省-东莞市-市辖区"
        },
        {
            "id": "442000",
            "name": "中山市",
            "parent_id": "440000",
            "level": "2",
            "full_name": "广东省-中山市"
        },
        {
            "id": "442001",
            "name": "市辖区",
            "parent_id": "442000",
            "level": "3",
            "full_name": "广东省-中山市-市辖区"
        },
        {
            "id": "445100",
            "name": "潮州市",
            "parent_id": "440000",
            "level": "2",
            "full_name": "广东省-潮州市"
        },
        {
            "id": "445101",
            "name": "市辖区",
            "parent_id": "445100",
            "level": "3",
            "full_name": "广东省-潮州市-市辖区"
        },
        {
            "id": "445102",
            "name": "湘桥区",
            "parent_id": "445100",
            "level": "3",
            "full_name": "广东省-潮州市-湘桥区"
        },
        {
            "id": "445103",
            "name": "潮安区",
            "parent_id": "445100",
            "level": "3",
            "full_name": "广东省-潮州市-潮安区"
        },
        {
            "id": "445122",
            "name": "饶平县",
            "parent_id": "445100",
            "level": "3",
            "full_name": "广东省-潮州市-饶平县"
        },
        {
            "id": "445200",
            "name": "揭阳市",
            "parent_id": "440000",
            "level": "2",
            "full_name": "广东省-揭阳市"
        },
        {
            "id": "445201",
            "name": "市辖区",
            "parent_id": "445200",
            "level": "3",
            "full_name": "广东省-揭阳市-市辖区"
        },
        {
            "id": "445202",
            "name": "榕城区",
            "parent_id": "445200",
            "level": "3",
            "full_name": "广东省-揭阳市-榕城区"
        },
        {
            "id": "445203",
            "name": "揭东区",
            "parent_id": "445200",
            "level": "3",
            "full_name": "广东省-揭阳市-揭东区"
        },
        {
            "id": "445222",
            "name": "揭西县",
            "parent_id": "445200",
            "level": "3",
            "full_name": "广东省-揭阳市-揭西县"
        },
        {
            "id": "445224",
            "name": "惠来县",
            "parent_id": "445200",
            "level": "3",
            "full_name": "广东省-揭阳市-惠来县"
        },
        {
            "id": "445281",
            "name": "普宁市",
            "parent_id": "445200",
            "level": "3",
            "full_name": "广东省-揭阳市-普宁市"
        },
        {
            "id": "445300",
            "name": "云浮市",
            "parent_id": "440000",
            "level": "2",
            "full_name": "广东省-云浮市"
        },
        {
            "id": "445301",
            "name": "市辖区",
            "parent_id": "445300",
            "level": "3",
            "full_name": "广东省-云浮市-市辖区"
        },
        {
            "id": "445302",
            "name": "云城区",
            "parent_id": "445300",
            "level": "3",
            "full_name": "广东省-云浮市-云城区"
        },
        {
            "id": "445303",
            "name": "云安区",
            "parent_id": "445300",
            "level": "3",
            "full_name": "广东省-云浮市-云安区"
        },
        {
            "id": "445321",
            "name": "新兴县",
            "parent_id": "445300",
            "level": "3",
            "full_name": "广东省-云浮市-新兴县"
        },
        {
            "id": "445322",
            "name": "郁南县",
            "parent_id": "445300",
            "level": "3",
            "full_name": "广东省-云浮市-郁南县"
        },
        {
            "id": "445381",
            "name": "罗定市",
            "parent_id": "445300",
            "level": "3",
            "full_name": "广东省-云浮市-罗定市"
        },
        {
            "id": "450000",
            "name": "广西壮族自治区",
            "parent_id": "0",
            "level": "1",
            "full_name": "广西壮族自治区"
        },
        {
            "id": "450100",
            "name": "南宁市",
            "parent_id": "450000",
            "level": "2",
            "full_name": "广西壮族自治区-南宁市"
        },
        {
            "id": "450101",
            "name": "市辖区",
            "parent_id": "450100",
            "level": "3",
            "full_name": "广西壮族自治区-南宁市-市辖区"
        },
        {
            "id": "450102",
            "name": "兴宁区",
            "parent_id": "450100",
            "level": "3",
            "full_name": "广西壮族自治区-南宁市-兴宁区"
        },
        {
            "id": "450103",
            "name": "青秀区",
            "parent_id": "450100",
            "level": "3",
            "full_name": "广西壮族自治区-南宁市-青秀区"
        },
        {
            "id": "450105",
            "name": "江南区",
            "parent_id": "450100",
            "level": "3",
            "full_name": "广西壮族自治区-南宁市-江南区"
        },
        {
            "id": "450107",
            "name": "西乡塘区",
            "parent_id": "450100",
            "level": "3",
            "full_name": "广西壮族自治区-南宁市-西乡塘区"
        },
        {
            "id": "450108",
            "name": "良庆区",
            "parent_id": "450100",
            "level": "3",
            "full_name": "广西壮族自治区-南宁市-良庆区"
        },
        {
            "id": "450109",
            "name": "邕宁区",
            "parent_id": "450100",
            "level": "3",
            "full_name": "广西壮族自治区-南宁市-邕宁区"
        },
        {
            "id": "450110",
            "name": "武鸣区",
            "parent_id": "450100",
            "level": "3",
            "full_name": "广西壮族自治区-南宁市-武鸣区"
        },
        {
            "id": "450123",
            "name": "隆安县",
            "parent_id": "450100",
            "level": "3",
            "full_name": "广西壮族自治区-南宁市-隆安县"
        },
        {
            "id": "450124",
            "name": "马山县",
            "parent_id": "450100",
            "level": "3",
            "full_name": "广西壮族自治区-南宁市-马山县"
        },
        {
            "id": "450125",
            "name": "上林县",
            "parent_id": "450100",
            "level": "3",
            "full_name": "广西壮族自治区-南宁市-上林县"
        },
        {
            "id": "450126",
            "name": "宾阳县",
            "parent_id": "450100",
            "level": "3",
            "full_name": "广西壮族自治区-南宁市-宾阳县"
        },
        {
            "id": "450127",
            "name": "横县",
            "parent_id": "450100",
            "level": "3",
            "full_name": "广西壮族自治区-南宁市-横县"
        },
        {
            "id": "450200",
            "name": "柳州市",
            "parent_id": "450000",
            "level": "2",
            "full_name": "广西壮族自治区-柳州市"
        },
        {
            "id": "450201",
            "name": "市辖区",
            "parent_id": "450200",
            "level": "3",
            "full_name": "广西壮族自治区-柳州市-市辖区"
        },
        {
            "id": "450202",
            "name": "城中区",
            "parent_id": "450200",
            "level": "3",
            "full_name": "广西壮族自治区-柳州市-城中区"
        },
        {
            "id": "450203",
            "name": "鱼峰区",
            "parent_id": "450200",
            "level": "3",
            "full_name": "广西壮族自治区-柳州市-鱼峰区"
        },
        {
            "id": "450204",
            "name": "柳南区",
            "parent_id": "450200",
            "level": "3",
            "full_name": "广西壮族自治区-柳州市-柳南区"
        },
        {
            "id": "450205",
            "name": "柳北区",
            "parent_id": "450200",
            "level": "3",
            "full_name": "广西壮族自治区-柳州市-柳北区"
        },
        {
            "id": "450221",
            "name": "柳江县",
            "parent_id": "450200",
            "level": "3",
            "full_name": "广西壮族自治区-柳州市-柳江县"
        },
        {
            "id": "450222",
            "name": "柳城县",
            "parent_id": "450200",
            "level": "3",
            "full_name": "广西壮族自治区-柳州市-柳城县"
        },
        {
            "id": "450223",
            "name": "鹿寨县",
            "parent_id": "450200",
            "level": "3",
            "full_name": "广西壮族自治区-柳州市-鹿寨县"
        },
        {
            "id": "450224",
            "name": "融安县",
            "parent_id": "450200",
            "level": "3",
            "full_name": "广西壮族自治区-柳州市-融安县"
        },
        {
            "id": "450225",
            "name": "融水苗族自治县",
            "parent_id": "450200",
            "level": "3",
            "full_name": "广西壮族自治区-柳州市-融水苗族自治县"
        },
        {
            "id": "450226",
            "name": "三江侗族自治县",
            "parent_id": "450200",
            "level": "3",
            "full_name": "广西壮族自治区-柳州市-三江侗族自治县"
        },
        {
            "id": "450300",
            "name": "桂林市",
            "parent_id": "450000",
            "level": "2",
            "full_name": "广西壮族自治区-桂林市"
        },
        {
            "id": "450301",
            "name": "市辖区",
            "parent_id": "450300",
            "level": "3",
            "full_name": "广西壮族自治区-桂林市-市辖区"
        },
        {
            "id": "450302",
            "name": "秀峰区",
            "parent_id": "450300",
            "level": "3",
            "full_name": "广西壮族自治区-桂林市-秀峰区"
        },
        {
            "id": "450303",
            "name": "叠彩区",
            "parent_id": "450300",
            "level": "3",
            "full_name": "广西壮族自治区-桂林市-叠彩区"
        },
        {
            "id": "450304",
            "name": "象山区",
            "parent_id": "450300",
            "level": "3",
            "full_name": "广西壮族自治区-桂林市-象山区"
        },
        {
            "id": "450305",
            "name": "七星区",
            "parent_id": "450300",
            "level": "3",
            "full_name": "广西壮族自治区-桂林市-七星区"
        },
        {
            "id": "450311",
            "name": "雁山区",
            "parent_id": "450300",
            "level": "3",
            "full_name": "广西壮族自治区-桂林市-雁山区"
        },
        {
            "id": "450312",
            "name": "临桂区",
            "parent_id": "450300",
            "level": "3",
            "full_name": "广西壮族自治区-桂林市-临桂区"
        },
        {
            "id": "450321",
            "name": "阳朔县",
            "parent_id": "450300",
            "level": "3",
            "full_name": "广西壮族自治区-桂林市-阳朔县"
        },
        {
            "id": "450323",
            "name": "灵川县",
            "parent_id": "450300",
            "level": "3",
            "full_name": "广西壮族自治区-桂林市-灵川县"
        },
        {
            "id": "450324",
            "name": "全州县",
            "parent_id": "450300",
            "level": "3",
            "full_name": "广西壮族自治区-桂林市-全州县"
        },
        {
            "id": "450325",
            "name": "兴安县",
            "parent_id": "450300",
            "level": "3",
            "full_name": "广西壮族自治区-桂林市-兴安县"
        },
        {
            "id": "450326",
            "name": "永福县",
            "parent_id": "450300",
            "level": "3",
            "full_name": "广西壮族自治区-桂林市-永福县"
        },
        {
            "id": "450327",
            "name": "灌阳县",
            "parent_id": "450300",
            "level": "3",
            "full_name": "广西壮族自治区-桂林市-灌阳县"
        },
        {
            "id": "450328",
            "name": "龙胜各族自治县",
            "parent_id": "450300",
            "level": "3",
            "full_name": "广西壮族自治区-桂林市-龙胜各族自治县"
        },
        {
            "id": "450329",
            "name": "资源县",
            "parent_id": "450300",
            "level": "3",
            "full_name": "广西壮族自治区-桂林市-资源县"
        },
        {
            "id": "450330",
            "name": "平乐县",
            "parent_id": "450300",
            "level": "3",
            "full_name": "广西壮族自治区-桂林市-平乐县"
        },
        {
            "id": "450331",
            "name": "荔浦县",
            "parent_id": "450300",
            "level": "3",
            "full_name": "广西壮族自治区-桂林市-荔浦县"
        },
        {
            "id": "450332",
            "name": "恭城瑶族自治县",
            "parent_id": "450300",
            "level": "3",
            "full_name": "广西壮族自治区-桂林市-恭城瑶族自治县"
        },
        {
            "id": "450400",
            "name": "梧州市",
            "parent_id": "450000",
            "level": "2",
            "full_name": "广西壮族自治区-梧州市"
        },
        {
            "id": "450401",
            "name": "市辖区",
            "parent_id": "450400",
            "level": "3",
            "full_name": "广西壮族自治区-梧州市-市辖区"
        },
        {
            "id": "450403",
            "name": "万秀区",
            "parent_id": "450400",
            "level": "3",
            "full_name": "广西壮族自治区-梧州市-万秀区"
        },
        {
            "id": "450405",
            "name": "长洲区",
            "parent_id": "450400",
            "level": "3",
            "full_name": "广西壮族自治区-梧州市-长洲区"
        },
        {
            "id": "450406",
            "name": "龙圩区",
            "parent_id": "450400",
            "level": "3",
            "full_name": "广西壮族自治区-梧州市-龙圩区"
        },
        {
            "id": "450421",
            "name": "苍梧县",
            "parent_id": "450400",
            "level": "3",
            "full_name": "广西壮族自治区-梧州市-苍梧县"
        },
        {
            "id": "450422",
            "name": "藤县",
            "parent_id": "450400",
            "level": "3",
            "full_name": "广西壮族自治区-梧州市-藤县"
        },
        {
            "id": "450423",
            "name": "蒙山县",
            "parent_id": "450400",
            "level": "3",
            "full_name": "广西壮族自治区-梧州市-蒙山县"
        },
        {
            "id": "450481",
            "name": "岑溪市",
            "parent_id": "450400",
            "level": "3",
            "full_name": "广西壮族自治区-梧州市-岑溪市"
        },
        {
            "id": "450500",
            "name": "北海市",
            "parent_id": "450000",
            "level": "2",
            "full_name": "广西壮族自治区-北海市"
        },
        {
            "id": "450501",
            "name": "市辖区",
            "parent_id": "450500",
            "level": "3",
            "full_name": "广西壮族自治区-北海市-市辖区"
        },
        {
            "id": "450502",
            "name": "海城区",
            "parent_id": "450500",
            "level": "3",
            "full_name": "广西壮族自治区-北海市-海城区"
        },
        {
            "id": "450503",
            "name": "银海区",
            "parent_id": "450500",
            "level": "3",
            "full_name": "广西壮族自治区-北海市-银海区"
        },
        {
            "id": "450512",
            "name": "铁山港区",
            "parent_id": "450500",
            "level": "3",
            "full_name": "广西壮族自治区-北海市-铁山港区"
        },
        {
            "id": "450521",
            "name": "合浦县",
            "parent_id": "450500",
            "level": "3",
            "full_name": "广西壮族自治区-北海市-合浦县"
        },
        {
            "id": "450600",
            "name": "防城港市",
            "parent_id": "450000",
            "level": "2",
            "full_name": "广西壮族自治区-防城港市"
        },
        {
            "id": "450601",
            "name": "市辖区",
            "parent_id": "450600",
            "level": "3",
            "full_name": "广西壮族自治区-防城港市-市辖区"
        },
        {
            "id": "450602",
            "name": "港口区",
            "parent_id": "450600",
            "level": "3",
            "full_name": "广西壮族自治区-防城港市-港口区"
        },
        {
            "id": "450603",
            "name": "防城区",
            "parent_id": "450600",
            "level": "3",
            "full_name": "广西壮族自治区-防城港市-防城区"
        },
        {
            "id": "450621",
            "name": "上思县",
            "parent_id": "450600",
            "level": "3",
            "full_name": "广西壮族自治区-防城港市-上思县"
        },
        {
            "id": "450681",
            "name": "东兴市",
            "parent_id": "450600",
            "level": "3",
            "full_name": "广西壮族自治区-防城港市-东兴市"
        },
        {
            "id": "450700",
            "name": "钦州市",
            "parent_id": "450000",
            "level": "2",
            "full_name": "广西壮族自治区-钦州市"
        },
        {
            "id": "450701",
            "name": "市辖区",
            "parent_id": "450700",
            "level": "3",
            "full_name": "广西壮族自治区-钦州市-市辖区"
        },
        {
            "id": "450702",
            "name": "钦南区",
            "parent_id": "450700",
            "level": "3",
            "full_name": "广西壮族自治区-钦州市-钦南区"
        },
        {
            "id": "450703",
            "name": "钦北区",
            "parent_id": "450700",
            "level": "3",
            "full_name": "广西壮族自治区-钦州市-钦北区"
        },
        {
            "id": "450721",
            "name": "灵山县",
            "parent_id": "450700",
            "level": "3",
            "full_name": "广西壮族自治区-钦州市-灵山县"
        },
        {
            "id": "450722",
            "name": "浦北县",
            "parent_id": "450700",
            "level": "3",
            "full_name": "广西壮族自治区-钦州市-浦北县"
        },
        {
            "id": "450800",
            "name": "贵港市",
            "parent_id": "450000",
            "level": "2",
            "full_name": "广西壮族自治区-贵港市"
        },
        {
            "id": "450801",
            "name": "市辖区",
            "parent_id": "450800",
            "level": "3",
            "full_name": "广西壮族自治区-贵港市-市辖区"
        },
        {
            "id": "450802",
            "name": "港北区",
            "parent_id": "450800",
            "level": "3",
            "full_name": "广西壮族自治区-贵港市-港北区"
        },
        {
            "id": "450803",
            "name": "港南区",
            "parent_id": "450800",
            "level": "3",
            "full_name": "广西壮族自治区-贵港市-港南区"
        },
        {
            "id": "450804",
            "name": "覃塘区",
            "parent_id": "450800",
            "level": "3",
            "full_name": "广西壮族自治区-贵港市-覃塘区"
        },
        {
            "id": "450821",
            "name": "平南县",
            "parent_id": "450800",
            "level": "3",
            "full_name": "广西壮族自治区-贵港市-平南县"
        },
        {
            "id": "450881",
            "name": "桂平市",
            "parent_id": "450800",
            "level": "3",
            "full_name": "广西壮族自治区-贵港市-桂平市"
        },
        {
            "id": "450900",
            "name": "玉林市",
            "parent_id": "450000",
            "level": "2",
            "full_name": "广西壮族自治区-玉林市"
        },
        {
            "id": "450901",
            "name": "市辖区",
            "parent_id": "450900",
            "level": "3",
            "full_name": "广西壮族自治区-玉林市-市辖区"
        },
        {
            "id": "450902",
            "name": "玉州区",
            "parent_id": "450900",
            "level": "3",
            "full_name": "广西壮族自治区-玉林市-玉州区"
        },
        {
            "id": "450903",
            "name": "福绵区",
            "parent_id": "450900",
            "level": "3",
            "full_name": "广西壮族自治区-玉林市-福绵区"
        },
        {
            "id": "450921",
            "name": "容县",
            "parent_id": "450900",
            "level": "3",
            "full_name": "广西壮族自治区-玉林市-容县"
        },
        {
            "id": "450922",
            "name": "陆川县",
            "parent_id": "450900",
            "level": "3",
            "full_name": "广西壮族自治区-玉林市-陆川县"
        },
        {
            "id": "450923",
            "name": "博白县",
            "parent_id": "450900",
            "level": "3",
            "full_name": "广西壮族自治区-玉林市-博白县"
        },
        {
            "id": "450924",
            "name": "兴业县",
            "parent_id": "450900",
            "level": "3",
            "full_name": "广西壮族自治区-玉林市-兴业县"
        },
        {
            "id": "450981",
            "name": "北流市",
            "parent_id": "450900",
            "level": "3",
            "full_name": "广西壮族自治区-玉林市-北流市"
        },
        {
            "id": "451000",
            "name": "百色市",
            "parent_id": "450000",
            "level": "2",
            "full_name": "广西壮族自治区-百色市"
        },
        {
            "id": "451001",
            "name": "市辖区",
            "parent_id": "451000",
            "level": "3",
            "full_name": "广西壮族自治区-百色市-市辖区"
        },
        {
            "id": "451002",
            "name": "右江区",
            "parent_id": "451000",
            "level": "3",
            "full_name": "广西壮族自治区-百色市-右江区"
        },
        {
            "id": "451021",
            "name": "田阳县",
            "parent_id": "451000",
            "level": "3",
            "full_name": "广西壮族自治区-百色市-田阳县"
        },
        {
            "id": "451022",
            "name": "田东县",
            "parent_id": "451000",
            "level": "3",
            "full_name": "广西壮族自治区-百色市-田东县"
        },
        {
            "id": "451023",
            "name": "平果县",
            "parent_id": "451000",
            "level": "3",
            "full_name": "广西壮族自治区-百色市-平果县"
        },
        {
            "id": "451024",
            "name": "德保县",
            "parent_id": "451000",
            "level": "3",
            "full_name": "广西壮族自治区-百色市-德保县"
        },
        {
            "id": "451026",
            "name": "那坡县",
            "parent_id": "451000",
            "level": "3",
            "full_name": "广西壮族自治区-百色市-那坡县"
        },
        {
            "id": "451027",
            "name": "凌云县",
            "parent_id": "451000",
            "level": "3",
            "full_name": "广西壮族自治区-百色市-凌云县"
        },
        {
            "id": "451028",
            "name": "乐业县",
            "parent_id": "451000",
            "level": "3",
            "full_name": "广西壮族自治区-百色市-乐业县"
        },
        {
            "id": "451029",
            "name": "田林县",
            "parent_id": "451000",
            "level": "3",
            "full_name": "广西壮族自治区-百色市-田林县"
        },
        {
            "id": "451030",
            "name": "西林县",
            "parent_id": "451000",
            "level": "3",
            "full_name": "广西壮族自治区-百色市-西林县"
        },
        {
            "id": "451031",
            "name": "隆林各族自治县",
            "parent_id": "451000",
            "level": "3",
            "full_name": "广西壮族自治区-百色市-隆林各族自治县"
        },
        {
            "id": "451081",
            "name": "靖西市",
            "parent_id": "451000",
            "level": "3",
            "full_name": "广西壮族自治区-百色市-靖西市"
        },
        {
            "id": "451100",
            "name": "贺州市",
            "parent_id": "450000",
            "level": "2",
            "full_name": "广西壮族自治区-贺州市"
        },
        {
            "id": "451101",
            "name": "市辖区",
            "parent_id": "451100",
            "level": "3",
            "full_name": "广西壮族自治区-贺州市-市辖区"
        },
        {
            "id": "451102",
            "name": "八步区",
            "parent_id": "451100",
            "level": "3",
            "full_name": "广西壮族自治区-贺州市-八步区"
        },
        {
            "id": "451121",
            "name": "昭平县",
            "parent_id": "451100",
            "level": "3",
            "full_name": "广西壮族自治区-贺州市-昭平县"
        },
        {
            "id": "451122",
            "name": "钟山县",
            "parent_id": "451100",
            "level": "3",
            "full_name": "广西壮族自治区-贺州市-钟山县"
        },
        {
            "id": "451123",
            "name": "富川瑶族自治县",
            "parent_id": "451100",
            "level": "3",
            "full_name": "广西壮族自治区-贺州市-富川瑶族自治县"
        },
        {
            "id": "451200",
            "name": "河池市",
            "parent_id": "450000",
            "level": "2",
            "full_name": "广西壮族自治区-河池市"
        },
        {
            "id": "451201",
            "name": "市辖区",
            "parent_id": "451200",
            "level": "3",
            "full_name": "广西壮族自治区-河池市-市辖区"
        },
        {
            "id": "451202",
            "name": "金城江区",
            "parent_id": "451200",
            "level": "3",
            "full_name": "广西壮族自治区-河池市-金城江区"
        },
        {
            "id": "451221",
            "name": "南丹县",
            "parent_id": "451200",
            "level": "3",
            "full_name": "广西壮族自治区-河池市-南丹县"
        },
        {
            "id": "451222",
            "name": "天峨县",
            "parent_id": "451200",
            "level": "3",
            "full_name": "广西壮族自治区-河池市-天峨县"
        },
        {
            "id": "451223",
            "name": "凤山县",
            "parent_id": "451200",
            "level": "3",
            "full_name": "广西壮族自治区-河池市-凤山县"
        },
        {
            "id": "451224",
            "name": "东兰县",
            "parent_id": "451200",
            "level": "3",
            "full_name": "广西壮族自治区-河池市-东兰县"
        },
        {
            "id": "451225",
            "name": "罗城仫佬族自治县",
            "parent_id": "451200",
            "level": "3",
            "full_name": "广西壮族自治区-河池市-罗城仫佬族自治县"
        },
        {
            "id": "451226",
            "name": "环江毛南族自治县",
            "parent_id": "451200",
            "level": "3",
            "full_name": "广西壮族自治区-河池市-环江毛南族自治县"
        },
        {
            "id": "451227",
            "name": "巴马瑶族自治县",
            "parent_id": "451200",
            "level": "3",
            "full_name": "广西壮族自治区-河池市-巴马瑶族自治县"
        },
        {
            "id": "451228",
            "name": "都安瑶族自治县",
            "parent_id": "451200",
            "level": "3",
            "full_name": "广西壮族自治区-河池市-都安瑶族自治县"
        },
        {
            "id": "451229",
            "name": "大化瑶族自治县",
            "parent_id": "451200",
            "level": "3",
            "full_name": "广西壮族自治区-河池市-大化瑶族自治县"
        },
        {
            "id": "451281",
            "name": "宜州市",
            "parent_id": "451200",
            "level": "3",
            "full_name": "广西壮族自治区-河池市-宜州市"
        },
        {
            "id": "451300",
            "name": "来宾市",
            "parent_id": "450000",
            "level": "2",
            "full_name": "广西壮族自治区-来宾市"
        },
        {
            "id": "451301",
            "name": "市辖区",
            "parent_id": "451300",
            "level": "3",
            "full_name": "广西壮族自治区-来宾市-市辖区"
        },
        {
            "id": "451302",
            "name": "兴宾区",
            "parent_id": "451300",
            "level": "3",
            "full_name": "广西壮族自治区-来宾市-兴宾区"
        },
        {
            "id": "451321",
            "name": "忻城县",
            "parent_id": "451300",
            "level": "3",
            "full_name": "广西壮族自治区-来宾市-忻城县"
        },
        {
            "id": "451322",
            "name": "象州县",
            "parent_id": "451300",
            "level": "3",
            "full_name": "广西壮族自治区-来宾市-象州县"
        },
        {
            "id": "451323",
            "name": "武宣县",
            "parent_id": "451300",
            "level": "3",
            "full_name": "广西壮族自治区-来宾市-武宣县"
        },
        {
            "id": "451324",
            "name": "金秀瑶族自治县",
            "parent_id": "451300",
            "level": "3",
            "full_name": "广西壮族自治区-来宾市-金秀瑶族自治县"
        },
        {
            "id": "451381",
            "name": "合山市",
            "parent_id": "451300",
            "level": "3",
            "full_name": "广西壮族自治区-来宾市-合山市"
        },
        {
            "id": "451400",
            "name": "崇左市",
            "parent_id": "450000",
            "level": "2",
            "full_name": "广西壮族自治区-崇左市"
        },
        {
            "id": "451401",
            "name": "市辖区",
            "parent_id": "451400",
            "level": "3",
            "full_name": "广西壮族自治区-崇左市-市辖区"
        },
        {
            "id": "451402",
            "name": "江州区",
            "parent_id": "451400",
            "level": "3",
            "full_name": "广西壮族自治区-崇左市-江州区"
        },
        {
            "id": "451421",
            "name": "扶绥县",
            "parent_id": "451400",
            "level": "3",
            "full_name": "广西壮族自治区-崇左市-扶绥县"
        },
        {
            "id": "451422",
            "name": "宁明县",
            "parent_id": "451400",
            "level": "3",
            "full_name": "广西壮族自治区-崇左市-宁明县"
        },
        {
            "id": "451423",
            "name": "龙州县",
            "parent_id": "451400",
            "level": "3",
            "full_name": "广西壮族自治区-崇左市-龙州县"
        },
        {
            "id": "451424",
            "name": "大新县",
            "parent_id": "451400",
            "level": "3",
            "full_name": "广西壮族自治区-崇左市-大新县"
        },
        {
            "id": "451425",
            "name": "天等县",
            "parent_id": "451400",
            "level": "3",
            "full_name": "广西壮族自治区-崇左市-天等县"
        },
        {
            "id": "451481",
            "name": "凭祥市",
            "parent_id": "451400",
            "level": "3",
            "full_name": "广西壮族自治区-崇左市-凭祥市"
        },
        {
            "id": "460000",
            "name": "海南省",
            "parent_id": "0",
            "level": "1",
            "full_name": "海南省"
        },
        {
            "id": "460100",
            "name": "海口市",
            "parent_id": "460000",
            "level": "2",
            "full_name": "海南省-海口市"
        },
        {
            "id": "460101",
            "name": "市辖区",
            "parent_id": "460100",
            "level": "3",
            "full_name": "海南省-海口市-市辖区"
        },
        {
            "id": "460105",
            "name": "秀英区",
            "parent_id": "460100",
            "level": "3",
            "full_name": "海南省-海口市-秀英区"
        },
        {
            "id": "460106",
            "name": "龙华区",
            "parent_id": "460100",
            "level": "3",
            "full_name": "海南省-海口市-龙华区"
        },
        {
            "id": "460107",
            "name": "琼山区",
            "parent_id": "460100",
            "level": "3",
            "full_name": "海南省-海口市-琼山区"
        },
        {
            "id": "460108",
            "name": "美兰区",
            "parent_id": "460100",
            "level": "3",
            "full_name": "海南省-海口市-美兰区"
        },
        {
            "id": "460200",
            "name": "三亚市",
            "parent_id": "460000",
            "level": "2",
            "full_name": "海南省-三亚市"
        },
        {
            "id": "460201",
            "name": "市辖区",
            "parent_id": "460200",
            "level": "3",
            "full_name": "海南省-三亚市-市辖区"
        },
        {
            "id": "460202",
            "name": "海棠区",
            "parent_id": "460200",
            "level": "3",
            "full_name": "海南省-三亚市-海棠区"
        },
        {
            "id": "460203",
            "name": "吉阳区",
            "parent_id": "460200",
            "level": "3",
            "full_name": "海南省-三亚市-吉阳区"
        },
        {
            "id": "460204",
            "name": "天涯区",
            "parent_id": "460200",
            "level": "3",
            "full_name": "海南省-三亚市-天涯区"
        },
        {
            "id": "460205",
            "name": "崖州区",
            "parent_id": "460200",
            "level": "3",
            "full_name": "海南省-三亚市-崖州区"
        },
        {
            "id": "460300",
            "name": "三沙市",
            "parent_id": "460000",
            "level": "2",
            "full_name": "海南省-三沙市"
        },
        {
            "id": "460321",
            "name": "西沙群岛",
            "parent_id": "460300",
            "level": "3",
            "full_name": "海南省-三沙市-西沙群岛"
        },
        {
            "id": "460322",
            "name": "南沙群岛",
            "parent_id": "460300",
            "level": "3",
            "full_name": "海南省-三沙市-南沙群岛"
        },
        {
            "id": "460323",
            "name": "中沙群岛的岛礁及其海域",
            "parent_id": "460300",
            "level": "3",
            "full_name": "海南省-三沙市-中沙群岛的岛礁及其海域"
        },
        {
            "id": "469000",
            "name": "省直辖县级行政区划",
            "parent_id": "460000",
            "level": "2",
            "full_name": "海南省-省直辖县级行政区划"
        },
        {
            "id": "469001",
            "name": "五指山市",
            "parent_id": "469000",
            "level": "3",
            "full_name": "海南省-省直辖县级行政区划-五指山市"
        },
        {
            "id": "469002",
            "name": "琼海市",
            "parent_id": "469000",
            "level": "3",
            "full_name": "海南省-省直辖县级行政区划-琼海市"
        },
        {
            "id": "469003",
            "name": "儋州市",
            "parent_id": "469000",
            "level": "3",
            "full_name": "海南省-省直辖县级行政区划-儋州市"
        },
        {
            "id": "469005",
            "name": "文昌市",
            "parent_id": "469000",
            "level": "3",
            "full_name": "海南省-省直辖县级行政区划-文昌市"
        },
        {
            "id": "469006",
            "name": "万宁市",
            "parent_id": "469000",
            "level": "3",
            "full_name": "海南省-省直辖县级行政区划-万宁市"
        },
        {
            "id": "469007",
            "name": "东方市",
            "parent_id": "469000",
            "level": "3",
            "full_name": "海南省-省直辖县级行政区划-东方市"
        },
        {
            "id": "469021",
            "name": "定安县",
            "parent_id": "469000",
            "level": "3",
            "full_name": "海南省-省直辖县级行政区划-定安县"
        },
        {
            "id": "469022",
            "name": "屯昌县",
            "parent_id": "469000",
            "level": "3",
            "full_name": "海南省-省直辖县级行政区划-屯昌县"
        },
        {
            "id": "469023",
            "name": "澄迈县",
            "parent_id": "469000",
            "level": "3",
            "full_name": "海南省-省直辖县级行政区划-澄迈县"
        },
        {
            "id": "469024",
            "name": "临高县",
            "parent_id": "469000",
            "level": "3",
            "full_name": "海南省-省直辖县级行政区划-临高县"
        },
        {
            "id": "469025",
            "name": "白沙黎族自治县",
            "parent_id": "469000",
            "level": "3",
            "full_name": "海南省-省直辖县级行政区划-白沙黎族自治县"
        },
        {
            "id": "469026",
            "name": "昌江黎族自治县",
            "parent_id": "469000",
            "level": "3",
            "full_name": "海南省-省直辖县级行政区划-昌江黎族自治县"
        },
        {
            "id": "469027",
            "name": "乐东黎族自治县",
            "parent_id": "469000",
            "level": "3",
            "full_name": "海南省-省直辖县级行政区划-乐东黎族自治县"
        },
        {
            "id": "469028",
            "name": "陵水黎族自治县",
            "parent_id": "469000",
            "level": "3",
            "full_name": "海南省-省直辖县级行政区划-陵水黎族自治县"
        },
        {
            "id": "469029",
            "name": "保亭黎族苗族自治县",
            "parent_id": "469000",
            "level": "3",
            "full_name": "海南省-省直辖县级行政区划-保亭黎族苗族自治县"
        },
        {
            "id": "469030",
            "name": "琼中黎族苗族自治县",
            "parent_id": "469000",
            "level": "3",
            "full_name": "海南省-省直辖县级行政区划-琼中黎族苗族自治县"
        },
        {
            "id": "500000",
            "name": "重庆市",
            "parent_id": "0",
            "level": "1",
            "full_name": "重庆市"
        },
        {
            "id": "500100",
            "name": "市辖区",
            "parent_id": "500000",
            "level": "2",
            "full_name": "重庆市-市辖区"
        },
        {
            "id": "500101",
            "name": "万州区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-万州区"
        },
        {
            "id": "500102",
            "name": "涪陵区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-涪陵区"
        },
        {
            "id": "500103",
            "name": "渝中区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-渝中区"
        },
        {
            "id": "500104",
            "name": "大渡口区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-大渡口区"
        },
        {
            "id": "500105",
            "name": "江北区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-江北区"
        },
        {
            "id": "500106",
            "name": "沙坪坝区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-沙坪坝区"
        },
        {
            "id": "500107",
            "name": "九龙坡区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-九龙坡区"
        },
        {
            "id": "500108",
            "name": "南岸区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-南岸区"
        },
        {
            "id": "500109",
            "name": "北碚区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-北碚区"
        },
        {
            "id": "500110",
            "name": "綦江区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-綦江区"
        },
        {
            "id": "500111",
            "name": "大足区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-大足区"
        },
        {
            "id": "500112",
            "name": "渝北区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-渝北区"
        },
        {
            "id": "500113",
            "name": "巴南区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-巴南区"
        },
        {
            "id": "500114",
            "name": "黔江区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-黔江区"
        },
        {
            "id": "500115",
            "name": "长寿区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-长寿区"
        },
        {
            "id": "500116",
            "name": "江津区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-江津区"
        },
        {
            "id": "500117",
            "name": "合川区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-合川区"
        },
        {
            "id": "500118",
            "name": "永川区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-永川区"
        },
        {
            "id": "500119",
            "name": "南川区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-南川区"
        },
        {
            "id": "500120",
            "name": "璧山区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-璧山区"
        },
        {
            "id": "500151",
            "name": "铜梁区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-铜梁区"
        },
        {
            "id": "500152",
            "name": "潼南区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-潼南区"
        },
        {
            "id": "500153",
            "name": "荣昌区",
            "parent_id": "500100",
            "level": "3",
            "full_name": "重庆市-市辖区-荣昌区"
        },
        {
            "id": "500200",
            "name": "县",
            "parent_id": "500000",
            "level": "2",
            "full_name": "重庆市-县"
        },
        {
            "id": "500228",
            "name": "梁平县",
            "parent_id": "500200",
            "level": "3",
            "full_name": "重庆市-县-梁平县"
        },
        {
            "id": "500229",
            "name": "城口县",
            "parent_id": "500200",
            "level": "3",
            "full_name": "重庆市-县-城口县"
        },
        {
            "id": "500230",
            "name": "丰都县",
            "parent_id": "500200",
            "level": "3",
            "full_name": "重庆市-县-丰都县"
        },
        {
            "id": "500231",
            "name": "垫江县",
            "parent_id": "500200",
            "level": "3",
            "full_name": "重庆市-县-垫江县"
        },
        {
            "id": "500232",
            "name": "武隆县",
            "parent_id": "500200",
            "level": "3",
            "full_name": "重庆市-县-武隆县"
        },
        {
            "id": "500233",
            "name": "忠县",
            "parent_id": "500200",
            "level": "3",
            "full_name": "重庆市-县-忠县"
        },
        {
            "id": "500234",
            "name": "开县",
            "parent_id": "500200",
            "level": "3",
            "full_name": "重庆市-县-开县"
        },
        {
            "id": "500235",
            "name": "云阳县",
            "parent_id": "500200",
            "level": "3",
            "full_name": "重庆市-县-云阳县"
        },
        {
            "id": "500236",
            "name": "奉节县",
            "parent_id": "500200",
            "level": "3",
            "full_name": "重庆市-县-奉节县"
        },
        {
            "id": "500237",
            "name": "巫山县",
            "parent_id": "500200",
            "level": "3",
            "full_name": "重庆市-县-巫山县"
        },
        {
            "id": "500238",
            "name": "巫溪县",
            "parent_id": "500200",
            "level": "3",
            "full_name": "重庆市-县-巫溪县"
        },
        {
            "id": "500240",
            "name": "石柱土家族自治县",
            "parent_id": "500200",
            "level": "3",
            "full_name": "重庆市-县-石柱土家族自治县"
        },
        {
            "id": "500241",
            "name": "秀山土家族苗族自治县",
            "parent_id": "500200",
            "level": "3",
            "full_name": "重庆市-县-秀山土家族苗族自治县"
        },
        {
            "id": "500242",
            "name": "酉阳土家族苗族自治县",
            "parent_id": "500200",
            "level": "3",
            "full_name": "重庆市-县-酉阳土家族苗族自治县"
        },
        {
            "id": "500243",
            "name": "彭水苗族土家族自治县",
            "parent_id": "500200",
            "level": "3",
            "full_name": "重庆市-县-彭水苗族土家族自治县"
        },
        {
            "id": "510000",
            "name": "四川省",
            "parent_id": "0",
            "level": "1",
            "full_name": "四川省"
        },
        {
            "id": "510100",
            "name": "成都市",
            "parent_id": "510000",
            "level": "2",
            "full_name": "四川省-成都市"
        },
        {
            "id": "510101",
            "name": "市辖区",
            "parent_id": "510100",
            "level": "3",
            "full_name": "四川省-成都市-市辖区"
        },
        {
            "id": "510104",
            "name": "锦江区",
            "parent_id": "510100",
            "level": "3",
            "full_name": "四川省-成都市-锦江区"
        },
        {
            "id": "510105",
            "name": "青羊区",
            "parent_id": "510100",
            "level": "3",
            "full_name": "四川省-成都市-青羊区"
        },
        {
            "id": "510106",
            "name": "金牛区",
            "parent_id": "510100",
            "level": "3",
            "full_name": "四川省-成都市-金牛区"
        },
        {
            "id": "510107",
            "name": "武侯区",
            "parent_id": "510100",
            "level": "3",
            "full_name": "四川省-成都市-武侯区"
        },
        {
            "id": "510108",
            "name": "成华区",
            "parent_id": "510100",
            "level": "3",
            "full_name": "四川省-成都市-成华区"
        },
        {
            "id": "510112",
            "name": "龙泉驿区",
            "parent_id": "510100",
            "level": "3",
            "full_name": "四川省-成都市-龙泉驿区"
        },
        {
            "id": "510113",
            "name": "青白江区",
            "parent_id": "510100",
            "level": "3",
            "full_name": "四川省-成都市-青白江区"
        },
        {
            "id": "510114",
            "name": "新都区",
            "parent_id": "510100",
            "level": "3",
            "full_name": "四川省-成都市-新都区"
        },
        {
            "id": "510115",
            "name": "温江区",
            "parent_id": "510100",
            "level": "3",
            "full_name": "四川省-成都市-温江区"
        },
        {
            "id": "510121",
            "name": "金堂县",
            "parent_id": "510100",
            "level": "3",
            "full_name": "四川省-成都市-金堂县"
        },
        {
            "id": "510122",
            "name": "双流县",
            "parent_id": "510100",
            "level": "3",
            "full_name": "四川省-成都市-双流县"
        },
        {
            "id": "510124",
            "name": "郫县",
            "parent_id": "510100",
            "level": "3",
            "full_name": "四川省-成都市-郫县"
        },
        {
            "id": "510129",
            "name": "大邑县",
            "parent_id": "510100",
            "level": "3",
            "full_name": "四川省-成都市-大邑县"
        },
        {
            "id": "510131",
            "name": "蒲江县",
            "parent_id": "510100",
            "level": "3",
            "full_name": "四川省-成都市-蒲江县"
        },
        {
            "id": "510132",
            "name": "新津县",
            "parent_id": "510100",
            "level": "3",
            "full_name": "四川省-成都市-新津县"
        },
        {
            "id": "510181",
            "name": "都江堰市",
            "parent_id": "510100",
            "level": "3",
            "full_name": "四川省-成都市-都江堰市"
        },
        {
            "id": "510182",
            "name": "彭州市",
            "parent_id": "510100",
            "level": "3",
            "full_name": "四川省-成都市-彭州市"
        },
        {
            "id": "510183",
            "name": "邛崃市",
            "parent_id": "510100",
            "level": "3",
            "full_name": "四川省-成都市-邛崃市"
        },
        {
            "id": "510184",
            "name": "崇州市",
            "parent_id": "510100",
            "level": "3",
            "full_name": "四川省-成都市-崇州市"
        },
        {
            "id": "510300",
            "name": "自贡市",
            "parent_id": "510000",
            "level": "2",
            "full_name": "四川省-自贡市"
        },
        {
            "id": "510301",
            "name": "市辖区",
            "parent_id": "510300",
            "level": "3",
            "full_name": "四川省-自贡市-市辖区"
        },
        {
            "id": "510302",
            "name": "自流井区",
            "parent_id": "510300",
            "level": "3",
            "full_name": "四川省-自贡市-自流井区"
        },
        {
            "id": "510303",
            "name": "贡井区",
            "parent_id": "510300",
            "level": "3",
            "full_name": "四川省-自贡市-贡井区"
        },
        {
            "id": "510304",
            "name": "大安区",
            "parent_id": "510300",
            "level": "3",
            "full_name": "四川省-自贡市-大安区"
        },
        {
            "id": "510311",
            "name": "沿滩区",
            "parent_id": "510300",
            "level": "3",
            "full_name": "四川省-自贡市-沿滩区"
        },
        {
            "id": "510321",
            "name": "荣县",
            "parent_id": "510300",
            "level": "3",
            "full_name": "四川省-自贡市-荣县"
        },
        {
            "id": "510322",
            "name": "富顺县",
            "parent_id": "510300",
            "level": "3",
            "full_name": "四川省-自贡市-富顺县"
        },
        {
            "id": "510400",
            "name": "攀枝花市",
            "parent_id": "510000",
            "level": "2",
            "full_name": "四川省-攀枝花市"
        },
        {
            "id": "510401",
            "name": "市辖区",
            "parent_id": "510400",
            "level": "3",
            "full_name": "四川省-攀枝花市-市辖区"
        },
        {
            "id": "510402",
            "name": "东区",
            "parent_id": "510400",
            "level": "3",
            "full_name": "四川省-攀枝花市-东区"
        },
        {
            "id": "510403",
            "name": "西区",
            "parent_id": "510400",
            "level": "3",
            "full_name": "四川省-攀枝花市-西区"
        },
        {
            "id": "510411",
            "name": "仁和区",
            "parent_id": "510400",
            "level": "3",
            "full_name": "四川省-攀枝花市-仁和区"
        },
        {
            "id": "510421",
            "name": "米易县",
            "parent_id": "510400",
            "level": "3",
            "full_name": "四川省-攀枝花市-米易县"
        },
        {
            "id": "510422",
            "name": "盐边县",
            "parent_id": "510400",
            "level": "3",
            "full_name": "四川省-攀枝花市-盐边县"
        },
        {
            "id": "510500",
            "name": "泸州市",
            "parent_id": "510000",
            "level": "2",
            "full_name": "四川省-泸州市"
        },
        {
            "id": "510501",
            "name": "市辖区",
            "parent_id": "510500",
            "level": "3",
            "full_name": "四川省-泸州市-市辖区"
        },
        {
            "id": "510502",
            "name": "江阳区",
            "parent_id": "510500",
            "level": "3",
            "full_name": "四川省-泸州市-江阳区"
        },
        {
            "id": "510503",
            "name": "纳溪区",
            "parent_id": "510500",
            "level": "3",
            "full_name": "四川省-泸州市-纳溪区"
        },
        {
            "id": "510504",
            "name": "龙马潭区",
            "parent_id": "510500",
            "level": "3",
            "full_name": "四川省-泸州市-龙马潭区"
        },
        {
            "id": "510521",
            "name": "泸县",
            "parent_id": "510500",
            "level": "3",
            "full_name": "四川省-泸州市-泸县"
        },
        {
            "id": "510522",
            "name": "合江县",
            "parent_id": "510500",
            "level": "3",
            "full_name": "四川省-泸州市-合江县"
        },
        {
            "id": "510524",
            "name": "叙永县",
            "parent_id": "510500",
            "level": "3",
            "full_name": "四川省-泸州市-叙永县"
        },
        {
            "id": "510525",
            "name": "古蔺县",
            "parent_id": "510500",
            "level": "3",
            "full_name": "四川省-泸州市-古蔺县"
        },
        {
            "id": "510600",
            "name": "德阳市",
            "parent_id": "510000",
            "level": "2",
            "full_name": "四川省-德阳市"
        },
        {
            "id": "510601",
            "name": "市辖区",
            "parent_id": "510600",
            "level": "3",
            "full_name": "四川省-德阳市-市辖区"
        },
        {
            "id": "510603",
            "name": "旌阳区",
            "parent_id": "510600",
            "level": "3",
            "full_name": "四川省-德阳市-旌阳区"
        },
        {
            "id": "510623",
            "name": "中江县",
            "parent_id": "510600",
            "level": "3",
            "full_name": "四川省-德阳市-中江县"
        },
        {
            "id": "510626",
            "name": "罗江县",
            "parent_id": "510600",
            "level": "3",
            "full_name": "四川省-德阳市-罗江县"
        },
        {
            "id": "510681",
            "name": "广汉市",
            "parent_id": "510600",
            "level": "3",
            "full_name": "四川省-德阳市-广汉市"
        },
        {
            "id": "510682",
            "name": "什邡市",
            "parent_id": "510600",
            "level": "3",
            "full_name": "四川省-德阳市-什邡市"
        },
        {
            "id": "510683",
            "name": "绵竹市",
            "parent_id": "510600",
            "level": "3",
            "full_name": "四川省-德阳市-绵竹市"
        },
        {
            "id": "510700",
            "name": "绵阳市",
            "parent_id": "510000",
            "level": "2",
            "full_name": "四川省-绵阳市"
        },
        {
            "id": "510701",
            "name": "市辖区",
            "parent_id": "510700",
            "level": "3",
            "full_name": "四川省-绵阳市-市辖区"
        },
        {
            "id": "510703",
            "name": "涪城区",
            "parent_id": "510700",
            "level": "3",
            "full_name": "四川省-绵阳市-涪城区"
        },
        {
            "id": "510704",
            "name": "游仙区",
            "parent_id": "510700",
            "level": "3",
            "full_name": "四川省-绵阳市-游仙区"
        },
        {
            "id": "510722",
            "name": "三台县",
            "parent_id": "510700",
            "level": "3",
            "full_name": "四川省-绵阳市-三台县"
        },
        {
            "id": "510723",
            "name": "盐亭县",
            "parent_id": "510700",
            "level": "3",
            "full_name": "四川省-绵阳市-盐亭县"
        },
        {
            "id": "510724",
            "name": "安县",
            "parent_id": "510700",
            "level": "3",
            "full_name": "四川省-绵阳市-安县"
        },
        {
            "id": "510725",
            "name": "梓潼县",
            "parent_id": "510700",
            "level": "3",
            "full_name": "四川省-绵阳市-梓潼县"
        },
        {
            "id": "510726",
            "name": "北川羌族自治县",
            "parent_id": "510700",
            "level": "3",
            "full_name": "四川省-绵阳市-北川羌族自治县"
        },
        {
            "id": "510727",
            "name": "平武县",
            "parent_id": "510700",
            "level": "3",
            "full_name": "四川省-绵阳市-平武县"
        },
        {
            "id": "510781",
            "name": "江油市",
            "parent_id": "510700",
            "level": "3",
            "full_name": "四川省-绵阳市-江油市"
        },
        {
            "id": "510800",
            "name": "广元市",
            "parent_id": "510000",
            "level": "2",
            "full_name": "四川省-广元市"
        },
        {
            "id": "510801",
            "name": "市辖区",
            "parent_id": "510800",
            "level": "3",
            "full_name": "四川省-广元市-市辖区"
        },
        {
            "id": "510802",
            "name": "利州区",
            "parent_id": "510800",
            "level": "3",
            "full_name": "四川省-广元市-利州区"
        },
        {
            "id": "510811",
            "name": "昭化区",
            "parent_id": "510800",
            "level": "3",
            "full_name": "四川省-广元市-昭化区"
        },
        {
            "id": "510812",
            "name": "朝天区",
            "parent_id": "510800",
            "level": "3",
            "full_name": "四川省-广元市-朝天区"
        },
        {
            "id": "510821",
            "name": "旺苍县",
            "parent_id": "510800",
            "level": "3",
            "full_name": "四川省-广元市-旺苍县"
        },
        {
            "id": "510822",
            "name": "青川县",
            "parent_id": "510800",
            "level": "3",
            "full_name": "四川省-广元市-青川县"
        },
        {
            "id": "510823",
            "name": "剑阁县",
            "parent_id": "510800",
            "level": "3",
            "full_name": "四川省-广元市-剑阁县"
        },
        {
            "id": "510824",
            "name": "苍溪县",
            "parent_id": "510800",
            "level": "3",
            "full_name": "四川省-广元市-苍溪县"
        },
        {
            "id": "510900",
            "name": "遂宁市",
            "parent_id": "510000",
            "level": "2",
            "full_name": "四川省-遂宁市"
        },
        {
            "id": "510901",
            "name": "市辖区",
            "parent_id": "510900",
            "level": "3",
            "full_name": "四川省-遂宁市-市辖区"
        },
        {
            "id": "510903",
            "name": "船山区",
            "parent_id": "510900",
            "level": "3",
            "full_name": "四川省-遂宁市-船山区"
        },
        {
            "id": "510904",
            "name": "安居区",
            "parent_id": "510900",
            "level": "3",
            "full_name": "四川省-遂宁市-安居区"
        },
        {
            "id": "510921",
            "name": "蓬溪县",
            "parent_id": "510900",
            "level": "3",
            "full_name": "四川省-遂宁市-蓬溪县"
        },
        {
            "id": "510922",
            "name": "射洪县",
            "parent_id": "510900",
            "level": "3",
            "full_name": "四川省-遂宁市-射洪县"
        },
        {
            "id": "510923",
            "name": "大英县",
            "parent_id": "510900",
            "level": "3",
            "full_name": "四川省-遂宁市-大英县"
        },
        {
            "id": "511000",
            "name": "内江市",
            "parent_id": "510000",
            "level": "2",
            "full_name": "四川省-内江市"
        },
        {
            "id": "511001",
            "name": "市辖区",
            "parent_id": "511000",
            "level": "3",
            "full_name": "四川省-内江市-市辖区"
        },
        {
            "id": "511002",
            "name": "市中区",
            "parent_id": "511000",
            "level": "3",
            "full_name": "四川省-内江市-市中区"
        },
        {
            "id": "511011",
            "name": "东兴区",
            "parent_id": "511000",
            "level": "3",
            "full_name": "四川省-内江市-东兴区"
        },
        {
            "id": "511024",
            "name": "威远县",
            "parent_id": "511000",
            "level": "3",
            "full_name": "四川省-内江市-威远县"
        },
        {
            "id": "511025",
            "name": "资中县",
            "parent_id": "511000",
            "level": "3",
            "full_name": "四川省-内江市-资中县"
        },
        {
            "id": "511028",
            "name": "隆昌县",
            "parent_id": "511000",
            "level": "3",
            "full_name": "四川省-内江市-隆昌县"
        },
        {
            "id": "511100",
            "name": "乐山市",
            "parent_id": "510000",
            "level": "2",
            "full_name": "四川省-乐山市"
        },
        {
            "id": "511101",
            "name": "市辖区",
            "parent_id": "511100",
            "level": "3",
            "full_name": "四川省-乐山市-市辖区"
        },
        {
            "id": "511102",
            "name": "市中区",
            "parent_id": "511100",
            "level": "3",
            "full_name": "四川省-乐山市-市中区"
        },
        {
            "id": "511111",
            "name": "沙湾区",
            "parent_id": "511100",
            "level": "3",
            "full_name": "四川省-乐山市-沙湾区"
        },
        {
            "id": "511112",
            "name": "五通桥区",
            "parent_id": "511100",
            "level": "3",
            "full_name": "四川省-乐山市-五通桥区"
        },
        {
            "id": "511113",
            "name": "金口河区",
            "parent_id": "511100",
            "level": "3",
            "full_name": "四川省-乐山市-金口河区"
        },
        {
            "id": "511123",
            "name": "犍为县",
            "parent_id": "511100",
            "level": "3",
            "full_name": "四川省-乐山市-犍为县"
        },
        {
            "id": "511124",
            "name": "井研县",
            "parent_id": "511100",
            "level": "3",
            "full_name": "四川省-乐山市-井研县"
        },
        {
            "id": "511126",
            "name": "夹江县",
            "parent_id": "511100",
            "level": "3",
            "full_name": "四川省-乐山市-夹江县"
        },
        {
            "id": "511129",
            "name": "沐川县",
            "parent_id": "511100",
            "level": "3",
            "full_name": "四川省-乐山市-沐川县"
        },
        {
            "id": "511132",
            "name": "峨边彝族自治县",
            "parent_id": "511100",
            "level": "3",
            "full_name": "四川省-乐山市-峨边彝族自治县"
        },
        {
            "id": "511133",
            "name": "马边彝族自治县",
            "parent_id": "511100",
            "level": "3",
            "full_name": "四川省-乐山市-马边彝族自治县"
        },
        {
            "id": "511181",
            "name": "峨眉山市",
            "parent_id": "511100",
            "level": "3",
            "full_name": "四川省-乐山市-峨眉山市"
        },
        {
            "id": "511300",
            "name": "南充市",
            "parent_id": "510000",
            "level": "2",
            "full_name": "四川省-南充市"
        },
        {
            "id": "511301",
            "name": "市辖区",
            "parent_id": "511300",
            "level": "3",
            "full_name": "四川省-南充市-市辖区"
        },
        {
            "id": "511302",
            "name": "顺庆区",
            "parent_id": "511300",
            "level": "3",
            "full_name": "四川省-南充市-顺庆区"
        },
        {
            "id": "511303",
            "name": "高坪区",
            "parent_id": "511300",
            "level": "3",
            "full_name": "四川省-南充市-高坪区"
        },
        {
            "id": "511304",
            "name": "嘉陵区",
            "parent_id": "511300",
            "level": "3",
            "full_name": "四川省-南充市-嘉陵区"
        },
        {
            "id": "511321",
            "name": "南部县",
            "parent_id": "511300",
            "level": "3",
            "full_name": "四川省-南充市-南部县"
        },
        {
            "id": "511322",
            "name": "营山县",
            "parent_id": "511300",
            "level": "3",
            "full_name": "四川省-南充市-营山县"
        },
        {
            "id": "511323",
            "name": "蓬安县",
            "parent_id": "511300",
            "level": "3",
            "full_name": "四川省-南充市-蓬安县"
        },
        {
            "id": "511324",
            "name": "仪陇县",
            "parent_id": "511300",
            "level": "3",
            "full_name": "四川省-南充市-仪陇县"
        },
        {
            "id": "511325",
            "name": "西充县",
            "parent_id": "511300",
            "level": "3",
            "full_name": "四川省-南充市-西充县"
        },
        {
            "id": "511381",
            "name": "阆中市",
            "parent_id": "511300",
            "level": "3",
            "full_name": "四川省-南充市-阆中市"
        },
        {
            "id": "511400",
            "name": "眉山市",
            "parent_id": "510000",
            "level": "2",
            "full_name": "四川省-眉山市"
        },
        {
            "id": "511401",
            "name": "市辖区",
            "parent_id": "511400",
            "level": "3",
            "full_name": "四川省-眉山市-市辖区"
        },
        {
            "id": "511402",
            "name": "东坡区",
            "parent_id": "511400",
            "level": "3",
            "full_name": "四川省-眉山市-东坡区"
        },
        {
            "id": "511403",
            "name": "彭山区",
            "parent_id": "511400",
            "level": "3",
            "full_name": "四川省-眉山市-彭山区"
        },
        {
            "id": "511421",
            "name": "仁寿县",
            "parent_id": "511400",
            "level": "3",
            "full_name": "四川省-眉山市-仁寿县"
        },
        {
            "id": "511423",
            "name": "洪雅县",
            "parent_id": "511400",
            "level": "3",
            "full_name": "四川省-眉山市-洪雅县"
        },
        {
            "id": "511424",
            "name": "丹棱县",
            "parent_id": "511400",
            "level": "3",
            "full_name": "四川省-眉山市-丹棱县"
        },
        {
            "id": "511425",
            "name": "青神县",
            "parent_id": "511400",
            "level": "3",
            "full_name": "四川省-眉山市-青神县"
        },
        {
            "id": "511500",
            "name": "宜宾市",
            "parent_id": "510000",
            "level": "2",
            "full_name": "四川省-宜宾市"
        },
        {
            "id": "511501",
            "name": "市辖区",
            "parent_id": "511500",
            "level": "3",
            "full_name": "四川省-宜宾市-市辖区"
        },
        {
            "id": "511502",
            "name": "翠屏区",
            "parent_id": "511500",
            "level": "3",
            "full_name": "四川省-宜宾市-翠屏区"
        },
        {
            "id": "511503",
            "name": "南溪区",
            "parent_id": "511500",
            "level": "3",
            "full_name": "四川省-宜宾市-南溪区"
        },
        {
            "id": "511521",
            "name": "宜宾县",
            "parent_id": "511500",
            "level": "3",
            "full_name": "四川省-宜宾市-宜宾县"
        },
        {
            "id": "511523",
            "name": "江安县",
            "parent_id": "511500",
            "level": "3",
            "full_name": "四川省-宜宾市-江安县"
        },
        {
            "id": "511524",
            "name": "长宁县",
            "parent_id": "511500",
            "level": "3",
            "full_name": "四川省-宜宾市-长宁县"
        },
        {
            "id": "511525",
            "name": "高县",
            "parent_id": "511500",
            "level": "3",
            "full_name": "四川省-宜宾市-高县"
        },
        {
            "id": "511526",
            "name": "珙县",
            "parent_id": "511500",
            "level": "3",
            "full_name": "四川省-宜宾市-珙县"
        },
        {
            "id": "511527",
            "name": "筠连县",
            "parent_id": "511500",
            "level": "3",
            "full_name": "四川省-宜宾市-筠连县"
        },
        {
            "id": "511528",
            "name": "兴文县",
            "parent_id": "511500",
            "level": "3",
            "full_name": "四川省-宜宾市-兴文县"
        },
        {
            "id": "511529",
            "name": "屏山县",
            "parent_id": "511500",
            "level": "3",
            "full_name": "四川省-宜宾市-屏山县"
        },
        {
            "id": "511600",
            "name": "广安市",
            "parent_id": "510000",
            "level": "2",
            "full_name": "四川省-广安市"
        },
        {
            "id": "511601",
            "name": "市辖区",
            "parent_id": "511600",
            "level": "3",
            "full_name": "四川省-广安市-市辖区"
        },
        {
            "id": "511602",
            "name": "广安区",
            "parent_id": "511600",
            "level": "3",
            "full_name": "四川省-广安市-广安区"
        },
        {
            "id": "511603",
            "name": "前锋区",
            "parent_id": "511600",
            "level": "3",
            "full_name": "四川省-广安市-前锋区"
        },
        {
            "id": "511621",
            "name": "岳池县",
            "parent_id": "511600",
            "level": "3",
            "full_name": "四川省-广安市-岳池县"
        },
        {
            "id": "511622",
            "name": "武胜县",
            "parent_id": "511600",
            "level": "3",
            "full_name": "四川省-广安市-武胜县"
        },
        {
            "id": "511623",
            "name": "邻水县",
            "parent_id": "511600",
            "level": "3",
            "full_name": "四川省-广安市-邻水县"
        },
        {
            "id": "511681",
            "name": "华蓥市",
            "parent_id": "511600",
            "level": "3",
            "full_name": "四川省-广安市-华蓥市"
        },
        {
            "id": "511700",
            "name": "达州市",
            "parent_id": "510000",
            "level": "2",
            "full_name": "四川省-达州市"
        },
        {
            "id": "511701",
            "name": "市辖区",
            "parent_id": "511700",
            "level": "3",
            "full_name": "四川省-达州市-市辖区"
        },
        {
            "id": "511702",
            "name": "通川区",
            "parent_id": "511700",
            "level": "3",
            "full_name": "四川省-达州市-通川区"
        },
        {
            "id": "511703",
            "name": "达川区",
            "parent_id": "511700",
            "level": "3",
            "full_name": "四川省-达州市-达川区"
        },
        {
            "id": "511722",
            "name": "宣汉县",
            "parent_id": "511700",
            "level": "3",
            "full_name": "四川省-达州市-宣汉县"
        },
        {
            "id": "511723",
            "name": "开江县",
            "parent_id": "511700",
            "level": "3",
            "full_name": "四川省-达州市-开江县"
        },
        {
            "id": "511724",
            "name": "大竹县",
            "parent_id": "511700",
            "level": "3",
            "full_name": "四川省-达州市-大竹县"
        },
        {
            "id": "511725",
            "name": "渠县",
            "parent_id": "511700",
            "level": "3",
            "full_name": "四川省-达州市-渠县"
        },
        {
            "id": "511781",
            "name": "万源市",
            "parent_id": "511700",
            "level": "3",
            "full_name": "四川省-达州市-万源市"
        },
        {
            "id": "511800",
            "name": "雅安市",
            "parent_id": "510000",
            "level": "2",
            "full_name": "四川省-雅安市"
        },
        {
            "id": "511801",
            "name": "市辖区",
            "parent_id": "511800",
            "level": "3",
            "full_name": "四川省-雅安市-市辖区"
        },
        {
            "id": "511802",
            "name": "雨城区",
            "parent_id": "511800",
            "level": "3",
            "full_name": "四川省-雅安市-雨城区"
        },
        {
            "id": "511803",
            "name": "名山区",
            "parent_id": "511800",
            "level": "3",
            "full_name": "四川省-雅安市-名山区"
        },
        {
            "id": "511822",
            "name": "荥经县",
            "parent_id": "511800",
            "level": "3",
            "full_name": "四川省-雅安市-荥经县"
        },
        {
            "id": "511823",
            "name": "汉源县",
            "parent_id": "511800",
            "level": "3",
            "full_name": "四川省-雅安市-汉源县"
        },
        {
            "id": "511824",
            "name": "石棉县",
            "parent_id": "511800",
            "level": "3",
            "full_name": "四川省-雅安市-石棉县"
        },
        {
            "id": "511825",
            "name": "天全县",
            "parent_id": "511800",
            "level": "3",
            "full_name": "四川省-雅安市-天全县"
        },
        {
            "id": "511826",
            "name": "芦山县",
            "parent_id": "511800",
            "level": "3",
            "full_name": "四川省-雅安市-芦山县"
        },
        {
            "id": "511827",
            "name": "宝兴县",
            "parent_id": "511800",
            "level": "3",
            "full_name": "四川省-雅安市-宝兴县"
        },
        {
            "id": "511900",
            "name": "巴中市",
            "parent_id": "510000",
            "level": "2",
            "full_name": "四川省-巴中市"
        },
        {
            "id": "511901",
            "name": "市辖区",
            "parent_id": "511900",
            "level": "3",
            "full_name": "四川省-巴中市-市辖区"
        },
        {
            "id": "511902",
            "name": "巴州区",
            "parent_id": "511900",
            "level": "3",
            "full_name": "四川省-巴中市-巴州区"
        },
        {
            "id": "511903",
            "name": "恩阳区",
            "parent_id": "511900",
            "level": "3",
            "full_name": "四川省-巴中市-恩阳区"
        },
        {
            "id": "511921",
            "name": "通江县",
            "parent_id": "511900",
            "level": "3",
            "full_name": "四川省-巴中市-通江县"
        },
        {
            "id": "511922",
            "name": "南江县",
            "parent_id": "511900",
            "level": "3",
            "full_name": "四川省-巴中市-南江县"
        },
        {
            "id": "511923",
            "name": "平昌县",
            "parent_id": "511900",
            "level": "3",
            "full_name": "四川省-巴中市-平昌县"
        },
        {
            "id": "512000",
            "name": "资阳市",
            "parent_id": "510000",
            "level": "2",
            "full_name": "四川省-资阳市"
        },
        {
            "id": "512001",
            "name": "市辖区",
            "parent_id": "512000",
            "level": "3",
            "full_name": "四川省-资阳市-市辖区"
        },
        {
            "id": "512002",
            "name": "雁江区",
            "parent_id": "512000",
            "level": "3",
            "full_name": "四川省-资阳市-雁江区"
        },
        {
            "id": "512021",
            "name": "安岳县",
            "parent_id": "512000",
            "level": "3",
            "full_name": "四川省-资阳市-安岳县"
        },
        {
            "id": "512022",
            "name": "乐至县",
            "parent_id": "512000",
            "level": "3",
            "full_name": "四川省-资阳市-乐至县"
        },
        {
            "id": "512081",
            "name": "简阳市",
            "parent_id": "512000",
            "level": "3",
            "full_name": "四川省-资阳市-简阳市"
        },
        {
            "id": "513200",
            "name": "阿坝藏族羌族自治州",
            "parent_id": "510000",
            "level": "2",
            "full_name": "四川省-阿坝藏族羌族自治州"
        },
        {
            "id": "513221",
            "name": "汶川县",
            "parent_id": "513200",
            "level": "3",
            "full_name": "四川省-阿坝藏族羌族自治州-汶川县"
        },
        {
            "id": "513222",
            "name": "理县",
            "parent_id": "513200",
            "level": "3",
            "full_name": "四川省-阿坝藏族羌族自治州-理县"
        },
        {
            "id": "513223",
            "name": "茂县",
            "parent_id": "513200",
            "level": "3",
            "full_name": "四川省-阿坝藏族羌族自治州-茂县"
        },
        {
            "id": "513224",
            "name": "松潘县",
            "parent_id": "513200",
            "level": "3",
            "full_name": "四川省-阿坝藏族羌族自治州-松潘县"
        },
        {
            "id": "513225",
            "name": "九寨沟县",
            "parent_id": "513200",
            "level": "3",
            "full_name": "四川省-阿坝藏族羌族自治州-九寨沟县"
        },
        {
            "id": "513226",
            "name": "金川县",
            "parent_id": "513200",
            "level": "3",
            "full_name": "四川省-阿坝藏族羌族自治州-金川县"
        },
        {
            "id": "513227",
            "name": "小金县",
            "parent_id": "513200",
            "level": "3",
            "full_name": "四川省-阿坝藏族羌族自治州-小金县"
        },
        {
            "id": "513228",
            "name": "黑水县",
            "parent_id": "513200",
            "level": "3",
            "full_name": "四川省-阿坝藏族羌族自治州-黑水县"
        },
        {
            "id": "513229",
            "name": "马尔康县",
            "parent_id": "513200",
            "level": "3",
            "full_name": "四川省-阿坝藏族羌族自治州-马尔康县"
        },
        {
            "id": "513230",
            "name": "壤塘县",
            "parent_id": "513200",
            "level": "3",
            "full_name": "四川省-阿坝藏族羌族自治州-壤塘县"
        },
        {
            "id": "513231",
            "name": "阿坝县",
            "parent_id": "513200",
            "level": "3",
            "full_name": "四川省-阿坝藏族羌族自治州-阿坝县"
        },
        {
            "id": "513232",
            "name": "若尔盖县",
            "parent_id": "513200",
            "level": "3",
            "full_name": "四川省-阿坝藏族羌族自治州-若尔盖县"
        },
        {
            "id": "513233",
            "name": "红原县",
            "parent_id": "513200",
            "level": "3",
            "full_name": "四川省-阿坝藏族羌族自治州-红原县"
        },
        {
            "id": "513300",
            "name": "甘孜藏族自治州",
            "parent_id": "510000",
            "level": "2",
            "full_name": "四川省-甘孜藏族自治州"
        },
        {
            "id": "513301",
            "name": "康定市",
            "parent_id": "513300",
            "level": "3",
            "full_name": "四川省-甘孜藏族自治州-康定市"
        },
        {
            "id": "513322",
            "name": "泸定县",
            "parent_id": "513300",
            "level": "3",
            "full_name": "四川省-甘孜藏族自治州-泸定县"
        },
        {
            "id": "513323",
            "name": "丹巴县",
            "parent_id": "513300",
            "level": "3",
            "full_name": "四川省-甘孜藏族自治州-丹巴县"
        },
        {
            "id": "513324",
            "name": "九龙县",
            "parent_id": "513300",
            "level": "3",
            "full_name": "四川省-甘孜藏族自治州-九龙县"
        },
        {
            "id": "513325",
            "name": "雅江县",
            "parent_id": "513300",
            "level": "3",
            "full_name": "四川省-甘孜藏族自治州-雅江县"
        },
        {
            "id": "513326",
            "name": "道孚县",
            "parent_id": "513300",
            "level": "3",
            "full_name": "四川省-甘孜藏族自治州-道孚县"
        },
        {
            "id": "513327",
            "name": "炉霍县",
            "parent_id": "513300",
            "level": "3",
            "full_name": "四川省-甘孜藏族自治州-炉霍县"
        },
        {
            "id": "513328",
            "name": "甘孜县",
            "parent_id": "513300",
            "level": "3",
            "full_name": "四川省-甘孜藏族自治州-甘孜县"
        },
        {
            "id": "513329",
            "name": "新龙县",
            "parent_id": "513300",
            "level": "3",
            "full_name": "四川省-甘孜藏族自治州-新龙县"
        },
        {
            "id": "513330",
            "name": "德格县",
            "parent_id": "513300",
            "level": "3",
            "full_name": "四川省-甘孜藏族自治州-德格县"
        },
        {
            "id": "513331",
            "name": "白玉县",
            "parent_id": "513300",
            "level": "3",
            "full_name": "四川省-甘孜藏族自治州-白玉县"
        },
        {
            "id": "513332",
            "name": "石渠县",
            "parent_id": "513300",
            "level": "3",
            "full_name": "四川省-甘孜藏族自治州-石渠县"
        },
        {
            "id": "513333",
            "name": "色达县",
            "parent_id": "513300",
            "level": "3",
            "full_name": "四川省-甘孜藏族自治州-色达县"
        },
        {
            "id": "513334",
            "name": "理塘县",
            "parent_id": "513300",
            "level": "3",
            "full_name": "四川省-甘孜藏族自治州-理塘县"
        },
        {
            "id": "513335",
            "name": "巴塘县",
            "parent_id": "513300",
            "level": "3",
            "full_name": "四川省-甘孜藏族自治州-巴塘县"
        },
        {
            "id": "513336",
            "name": "乡城县",
            "parent_id": "513300",
            "level": "3",
            "full_name": "四川省-甘孜藏族自治州-乡城县"
        },
        {
            "id": "513337",
            "name": "稻城县",
            "parent_id": "513300",
            "level": "3",
            "full_name": "四川省-甘孜藏族自治州-稻城县"
        },
        {
            "id": "513338",
            "name": "得荣县",
            "parent_id": "513300",
            "level": "3",
            "full_name": "四川省-甘孜藏族自治州-得荣县"
        },
        {
            "id": "513400",
            "name": "凉山彝族自治州",
            "parent_id": "510000",
            "level": "2",
            "full_name": "四川省-凉山彝族自治州"
        },
        {
            "id": "513401",
            "name": "西昌市",
            "parent_id": "513400",
            "level": "3",
            "full_name": "四川省-凉山彝族自治州-西昌市"
        },
        {
            "id": "513422",
            "name": "木里藏族自治县",
            "parent_id": "513400",
            "level": "3",
            "full_name": "四川省-凉山彝族自治州-木里藏族自治县"
        },
        {
            "id": "513423",
            "name": "盐源县",
            "parent_id": "513400",
            "level": "3",
            "full_name": "四川省-凉山彝族自治州-盐源县"
        },
        {
            "id": "513424",
            "name": "德昌县",
            "parent_id": "513400",
            "level": "3",
            "full_name": "四川省-凉山彝族自治州-德昌县"
        },
        {
            "id": "513425",
            "name": "会理县",
            "parent_id": "513400",
            "level": "3",
            "full_name": "四川省-凉山彝族自治州-会理县"
        },
        {
            "id": "513426",
            "name": "会东县",
            "parent_id": "513400",
            "level": "3",
            "full_name": "四川省-凉山彝族自治州-会东县"
        },
        {
            "id": "513427",
            "name": "宁南县",
            "parent_id": "513400",
            "level": "3",
            "full_name": "四川省-凉山彝族自治州-宁南县"
        },
        {
            "id": "513428",
            "name": "普格县",
            "parent_id": "513400",
            "level": "3",
            "full_name": "四川省-凉山彝族自治州-普格县"
        },
        {
            "id": "513429",
            "name": "布拖县",
            "parent_id": "513400",
            "level": "3",
            "full_name": "四川省-凉山彝族自治州-布拖县"
        },
        {
            "id": "513430",
            "name": "金阳县",
            "parent_id": "513400",
            "level": "3",
            "full_name": "四川省-凉山彝族自治州-金阳县"
        },
        {
            "id": "513431",
            "name": "昭觉县",
            "parent_id": "513400",
            "level": "3",
            "full_name": "四川省-凉山彝族自治州-昭觉县"
        },
        {
            "id": "513432",
            "name": "喜德县",
            "parent_id": "513400",
            "level": "3",
            "full_name": "四川省-凉山彝族自治州-喜德县"
        },
        {
            "id": "513433",
            "name": "冕宁县",
            "parent_id": "513400",
            "level": "3",
            "full_name": "四川省-凉山彝族自治州-冕宁县"
        },
        {
            "id": "513434",
            "name": "越西县",
            "parent_id": "513400",
            "level": "3",
            "full_name": "四川省-凉山彝族自治州-越西县"
        },
        {
            "id": "513435",
            "name": "甘洛县",
            "parent_id": "513400",
            "level": "3",
            "full_name": "四川省-凉山彝族自治州-甘洛县"
        },
        {
            "id": "513436",
            "name": "美姑县",
            "parent_id": "513400",
            "level": "3",
            "full_name": "四川省-凉山彝族自治州-美姑县"
        },
        {
            "id": "513437",
            "name": "雷波县",
            "parent_id": "513400",
            "level": "3",
            "full_name": "四川省-凉山彝族自治州-雷波县"
        },
        {
            "id": "520000",
            "name": "贵州省",
            "parent_id": "0",
            "level": "1",
            "full_name": "贵州省"
        },
        {
            "id": "520100",
            "name": "贵阳市",
            "parent_id": "520000",
            "level": "2",
            "full_name": "贵州省-贵阳市"
        },
        {
            "id": "520101",
            "name": "市辖区",
            "parent_id": "520100",
            "level": "3",
            "full_name": "贵州省-贵阳市-市辖区"
        },
        {
            "id": "520102",
            "name": "南明区",
            "parent_id": "520100",
            "level": "3",
            "full_name": "贵州省-贵阳市-南明区"
        },
        {
            "id": "520103",
            "name": "云岩区",
            "parent_id": "520100",
            "level": "3",
            "full_name": "贵州省-贵阳市-云岩区"
        },
        {
            "id": "520111",
            "name": "花溪区",
            "parent_id": "520100",
            "level": "3",
            "full_name": "贵州省-贵阳市-花溪区"
        },
        {
            "id": "520112",
            "name": "乌当区",
            "parent_id": "520100",
            "level": "3",
            "full_name": "贵州省-贵阳市-乌当区"
        },
        {
            "id": "520113",
            "name": "白云区",
            "parent_id": "520100",
            "level": "3",
            "full_name": "贵州省-贵阳市-白云区"
        },
        {
            "id": "520115",
            "name": "观山湖区",
            "parent_id": "520100",
            "level": "3",
            "full_name": "贵州省-贵阳市-观山湖区"
        },
        {
            "id": "520121",
            "name": "开阳县",
            "parent_id": "520100",
            "level": "3",
            "full_name": "贵州省-贵阳市-开阳县"
        },
        {
            "id": "520122",
            "name": "息烽县",
            "parent_id": "520100",
            "level": "3",
            "full_name": "贵州省-贵阳市-息烽县"
        },
        {
            "id": "520123",
            "name": "修文县",
            "parent_id": "520100",
            "level": "3",
            "full_name": "贵州省-贵阳市-修文县"
        },
        {
            "id": "520181",
            "name": "清镇市",
            "parent_id": "520100",
            "level": "3",
            "full_name": "贵州省-贵阳市-清镇市"
        },
        {
            "id": "520200",
            "name": "六盘水市",
            "parent_id": "520000",
            "level": "2",
            "full_name": "贵州省-六盘水市"
        },
        {
            "id": "520201",
            "name": "钟山区",
            "parent_id": "520200",
            "level": "3",
            "full_name": "贵州省-六盘水市-钟山区"
        },
        {
            "id": "520203",
            "name": "六枝特区",
            "parent_id": "520200",
            "level": "3",
            "full_name": "贵州省-六盘水市-六枝特区"
        },
        {
            "id": "520221",
            "name": "水城县",
            "parent_id": "520200",
            "level": "3",
            "full_name": "贵州省-六盘水市-水城县"
        },
        {
            "id": "520222",
            "name": "盘县",
            "parent_id": "520200",
            "level": "3",
            "full_name": "贵州省-六盘水市-盘县"
        },
        {
            "id": "520300",
            "name": "遵义市",
            "parent_id": "520000",
            "level": "2",
            "full_name": "贵州省-遵义市"
        },
        {
            "id": "520301",
            "name": "市辖区",
            "parent_id": "520300",
            "level": "3",
            "full_name": "贵州省-遵义市-市辖区"
        },
        {
            "id": "520302",
            "name": "红花岗区",
            "parent_id": "520300",
            "level": "3",
            "full_name": "贵州省-遵义市-红花岗区"
        },
        {
            "id": "520303",
            "name": "汇川区",
            "parent_id": "520300",
            "level": "3",
            "full_name": "贵州省-遵义市-汇川区"
        },
        {
            "id": "520321",
            "name": "遵义县",
            "parent_id": "520300",
            "level": "3",
            "full_name": "贵州省-遵义市-遵义县"
        },
        {
            "id": "520322",
            "name": "桐梓县",
            "parent_id": "520300",
            "level": "3",
            "full_name": "贵州省-遵义市-桐梓县"
        },
        {
            "id": "520323",
            "name": "绥阳县",
            "parent_id": "520300",
            "level": "3",
            "full_name": "贵州省-遵义市-绥阳县"
        },
        {
            "id": "520324",
            "name": "正安县",
            "parent_id": "520300",
            "level": "3",
            "full_name": "贵州省-遵义市-正安县"
        },
        {
            "id": "520325",
            "name": "道真仡佬族苗族自治县",
            "parent_id": "520300",
            "level": "3",
            "full_name": "贵州省-遵义市-道真仡佬族苗族自治县"
        },
        {
            "id": "520326",
            "name": "务川仡佬族苗族自治县",
            "parent_id": "520300",
            "level": "3",
            "full_name": "贵州省-遵义市-务川仡佬族苗族自治县"
        },
        {
            "id": "520327",
            "name": "凤冈县",
            "parent_id": "520300",
            "level": "3",
            "full_name": "贵州省-遵义市-凤冈县"
        },
        {
            "id": "520328",
            "name": "湄潭县",
            "parent_id": "520300",
            "level": "3",
            "full_name": "贵州省-遵义市-湄潭县"
        },
        {
            "id": "520329",
            "name": "余庆县",
            "parent_id": "520300",
            "level": "3",
            "full_name": "贵州省-遵义市-余庆县"
        },
        {
            "id": "520330",
            "name": "习水县",
            "parent_id": "520300",
            "level": "3",
            "full_name": "贵州省-遵义市-习水县"
        },
        {
            "id": "520381",
            "name": "赤水市",
            "parent_id": "520300",
            "level": "3",
            "full_name": "贵州省-遵义市-赤水市"
        },
        {
            "id": "520382",
            "name": "仁怀市",
            "parent_id": "520300",
            "level": "3",
            "full_name": "贵州省-遵义市-仁怀市"
        },
        {
            "id": "520400",
            "name": "安顺市",
            "parent_id": "520000",
            "level": "2",
            "full_name": "贵州省-安顺市"
        },
        {
            "id": "520401",
            "name": "市辖区",
            "parent_id": "520400",
            "level": "3",
            "full_name": "贵州省-安顺市-市辖区"
        },
        {
            "id": "520402",
            "name": "西秀区",
            "parent_id": "520400",
            "level": "3",
            "full_name": "贵州省-安顺市-西秀区"
        },
        {
            "id": "520403",
            "name": "平坝区",
            "parent_id": "520400",
            "level": "3",
            "full_name": "贵州省-安顺市-平坝区"
        },
        {
            "id": "520422",
            "name": "普定县",
            "parent_id": "520400",
            "level": "3",
            "full_name": "贵州省-安顺市-普定县"
        },
        {
            "id": "520423",
            "name": "镇宁布依族苗族自治县",
            "parent_id": "520400",
            "level": "3",
            "full_name": "贵州省-安顺市-镇宁布依族苗族自治县"
        },
        {
            "id": "520424",
            "name": "关岭布依族苗族自治县",
            "parent_id": "520400",
            "level": "3",
            "full_name": "贵州省-安顺市-关岭布依族苗族自治县"
        },
        {
            "id": "520425",
            "name": "紫云苗族布依族自治县",
            "parent_id": "520400",
            "level": "3",
            "full_name": "贵州省-安顺市-紫云苗族布依族自治县"
        },
        {
            "id": "520500",
            "name": "毕节市",
            "parent_id": "520000",
            "level": "2",
            "full_name": "贵州省-毕节市"
        },
        {
            "id": "520501",
            "name": "市辖区",
            "parent_id": "520500",
            "level": "3",
            "full_name": "贵州省-毕节市-市辖区"
        },
        {
            "id": "520502",
            "name": "七星关区",
            "parent_id": "520500",
            "level": "3",
            "full_name": "贵州省-毕节市-七星关区"
        },
        {
            "id": "520521",
            "name": "大方县",
            "parent_id": "520500",
            "level": "3",
            "full_name": "贵州省-毕节市-大方县"
        },
        {
            "id": "520522",
            "name": "黔西县",
            "parent_id": "520500",
            "level": "3",
            "full_name": "贵州省-毕节市-黔西县"
        },
        {
            "id": "520523",
            "name": "金沙县",
            "parent_id": "520500",
            "level": "3",
            "full_name": "贵州省-毕节市-金沙县"
        },
        {
            "id": "520524",
            "name": "织金县",
            "parent_id": "520500",
            "level": "3",
            "full_name": "贵州省-毕节市-织金县"
        },
        {
            "id": "520525",
            "name": "纳雍县",
            "parent_id": "520500",
            "level": "3",
            "full_name": "贵州省-毕节市-纳雍县"
        },
        {
            "id": "520526",
            "name": "威宁彝族回族苗族自治县",
            "parent_id": "520500",
            "level": "3",
            "full_name": "贵州省-毕节市-威宁彝族回族苗族自治县"
        },
        {
            "id": "520527",
            "name": "赫章县",
            "parent_id": "520500",
            "level": "3",
            "full_name": "贵州省-毕节市-赫章县"
        },
        {
            "id": "520600",
            "name": "铜仁市",
            "parent_id": "520000",
            "level": "2",
            "full_name": "贵州省-铜仁市"
        },
        {
            "id": "520601",
            "name": "市辖区",
            "parent_id": "520600",
            "level": "3",
            "full_name": "贵州省-铜仁市-市辖区"
        },
        {
            "id": "520602",
            "name": "碧江区",
            "parent_id": "520600",
            "level": "3",
            "full_name": "贵州省-铜仁市-碧江区"
        },
        {
            "id": "520603",
            "name": "万山区",
            "parent_id": "520600",
            "level": "3",
            "full_name": "贵州省-铜仁市-万山区"
        },
        {
            "id": "520621",
            "name": "江口县",
            "parent_id": "520600",
            "level": "3",
            "full_name": "贵州省-铜仁市-江口县"
        },
        {
            "id": "520622",
            "name": "玉屏侗族自治县",
            "parent_id": "520600",
            "level": "3",
            "full_name": "贵州省-铜仁市-玉屏侗族自治县"
        },
        {
            "id": "520623",
            "name": "石阡县",
            "parent_id": "520600",
            "level": "3",
            "full_name": "贵州省-铜仁市-石阡县"
        },
        {
            "id": "520624",
            "name": "思南县",
            "parent_id": "520600",
            "level": "3",
            "full_name": "贵州省-铜仁市-思南县"
        },
        {
            "id": "520625",
            "name": "印江土家族苗族自治县",
            "parent_id": "520600",
            "level": "3",
            "full_name": "贵州省-铜仁市-印江土家族苗族自治县"
        },
        {
            "id": "520626",
            "name": "德江县",
            "parent_id": "520600",
            "level": "3",
            "full_name": "贵州省-铜仁市-德江县"
        },
        {
            "id": "520627",
            "name": "沿河土家族自治县",
            "parent_id": "520600",
            "level": "3",
            "full_name": "贵州省-铜仁市-沿河土家族自治县"
        },
        {
            "id": "520628",
            "name": "松桃苗族自治县",
            "parent_id": "520600",
            "level": "3",
            "full_name": "贵州省-铜仁市-松桃苗族自治县"
        },
        {
            "id": "522300",
            "name": "黔西南布依族苗族自治州",
            "parent_id": "520000",
            "level": "2",
            "full_name": "贵州省-黔西南布依族苗族自治州"
        },
        {
            "id": "522301",
            "name": "兴义市",
            "parent_id": "522300",
            "level": "3",
            "full_name": "贵州省-黔西南布依族苗族自治州-兴义市"
        },
        {
            "id": "522322",
            "name": "兴仁县",
            "parent_id": "522300",
            "level": "3",
            "full_name": "贵州省-黔西南布依族苗族自治州-兴仁县"
        },
        {
            "id": "522323",
            "name": "普安县",
            "parent_id": "522300",
            "level": "3",
            "full_name": "贵州省-黔西南布依族苗族自治州-普安县"
        },
        {
            "id": "522324",
            "name": "晴隆县",
            "parent_id": "522300",
            "level": "3",
            "full_name": "贵州省-黔西南布依族苗族自治州-晴隆县"
        },
        {
            "id": "522325",
            "name": "贞丰县",
            "parent_id": "522300",
            "level": "3",
            "full_name": "贵州省-黔西南布依族苗族自治州-贞丰县"
        },
        {
            "id": "522326",
            "name": "望谟县",
            "parent_id": "522300",
            "level": "3",
            "full_name": "贵州省-黔西南布依族苗族自治州-望谟县"
        },
        {
            "id": "522327",
            "name": "册亨县",
            "parent_id": "522300",
            "level": "3",
            "full_name": "贵州省-黔西南布依族苗族自治州-册亨县"
        },
        {
            "id": "522328",
            "name": "安龙县",
            "parent_id": "522300",
            "level": "3",
            "full_name": "贵州省-黔西南布依族苗族自治州-安龙县"
        },
        {
            "id": "522600",
            "name": "黔东南苗族侗族自治州",
            "parent_id": "520000",
            "level": "2",
            "full_name": "贵州省-黔东南苗族侗族自治州"
        },
        {
            "id": "522601",
            "name": "凯里市",
            "parent_id": "522600",
            "level": "3",
            "full_name": "贵州省-黔东南苗族侗族自治州-凯里市"
        },
        {
            "id": "522622",
            "name": "黄平县",
            "parent_id": "522600",
            "level": "3",
            "full_name": "贵州省-黔东南苗族侗族自治州-黄平县"
        },
        {
            "id": "522623",
            "name": "施秉县",
            "parent_id": "522600",
            "level": "3",
            "full_name": "贵州省-黔东南苗族侗族自治州-施秉县"
        },
        {
            "id": "522624",
            "name": "三穗县",
            "parent_id": "522600",
            "level": "3",
            "full_name": "贵州省-黔东南苗族侗族自治州-三穗县"
        },
        {
            "id": "522625",
            "name": "镇远县",
            "parent_id": "522600",
            "level": "3",
            "full_name": "贵州省-黔东南苗族侗族自治州-镇远县"
        },
        {
            "id": "522626",
            "name": "岑巩县",
            "parent_id": "522600",
            "level": "3",
            "full_name": "贵州省-黔东南苗族侗族自治州-岑巩县"
        },
        {
            "id": "522627",
            "name": "天柱县",
            "parent_id": "522600",
            "level": "3",
            "full_name": "贵州省-黔东南苗族侗族自治州-天柱县"
        },
        {
            "id": "522628",
            "name": "锦屏县",
            "parent_id": "522600",
            "level": "3",
            "full_name": "贵州省-黔东南苗族侗族自治州-锦屏县"
        },
        {
            "id": "522629",
            "name": "剑河县",
            "parent_id": "522600",
            "level": "3",
            "full_name": "贵州省-黔东南苗族侗族自治州-剑河县"
        },
        {
            "id": "522630",
            "name": "台江县",
            "parent_id": "522600",
            "level": "3",
            "full_name": "贵州省-黔东南苗族侗族自治州-台江县"
        },
        {
            "id": "522631",
            "name": "黎平县",
            "parent_id": "522600",
            "level": "3",
            "full_name": "贵州省-黔东南苗族侗族自治州-黎平县"
        },
        {
            "id": "522632",
            "name": "榕江县",
            "parent_id": "522600",
            "level": "3",
            "full_name": "贵州省-黔东南苗族侗族自治州-榕江县"
        },
        {
            "id": "522633",
            "name": "从江县",
            "parent_id": "522600",
            "level": "3",
            "full_name": "贵州省-黔东南苗族侗族自治州-从江县"
        },
        {
            "id": "522634",
            "name": "雷山县",
            "parent_id": "522600",
            "level": "3",
            "full_name": "贵州省-黔东南苗族侗族自治州-雷山县"
        },
        {
            "id": "522635",
            "name": "麻江县",
            "parent_id": "522600",
            "level": "3",
            "full_name": "贵州省-黔东南苗族侗族自治州-麻江县"
        },
        {
            "id": "522636",
            "name": "丹寨县",
            "parent_id": "522600",
            "level": "3",
            "full_name": "贵州省-黔东南苗族侗族自治州-丹寨县"
        },
        {
            "id": "522700",
            "name": "黔南布依族苗族自治州",
            "parent_id": "520000",
            "level": "2",
            "full_name": "贵州省-黔南布依族苗族自治州"
        },
        {
            "id": "522701",
            "name": "都匀市",
            "parent_id": "522700",
            "level": "3",
            "full_name": "贵州省-黔南布依族苗族自治州-都匀市"
        },
        {
            "id": "522702",
            "name": "福泉市",
            "parent_id": "522700",
            "level": "3",
            "full_name": "贵州省-黔南布依族苗族自治州-福泉市"
        },
        {
            "id": "522722",
            "name": "荔波县",
            "parent_id": "522700",
            "level": "3",
            "full_name": "贵州省-黔南布依族苗族自治州-荔波县"
        },
        {
            "id": "522723",
            "name": "贵定县",
            "parent_id": "522700",
            "level": "3",
            "full_name": "贵州省-黔南布依族苗族自治州-贵定县"
        },
        {
            "id": "522725",
            "name": "瓮安县",
            "parent_id": "522700",
            "level": "3",
            "full_name": "贵州省-黔南布依族苗族自治州-瓮安县"
        },
        {
            "id": "522726",
            "name": "独山县",
            "parent_id": "522700",
            "level": "3",
            "full_name": "贵州省-黔南布依族苗族自治州-独山县"
        },
        {
            "id": "522727",
            "name": "平塘县",
            "parent_id": "522700",
            "level": "3",
            "full_name": "贵州省-黔南布依族苗族自治州-平塘县"
        },
        {
            "id": "522728",
            "name": "罗甸县",
            "parent_id": "522700",
            "level": "3",
            "full_name": "贵州省-黔南布依族苗族自治州-罗甸县"
        },
        {
            "id": "522729",
            "name": "长顺县",
            "parent_id": "522700",
            "level": "3",
            "full_name": "贵州省-黔南布依族苗族自治州-长顺县"
        },
        {
            "id": "522730",
            "name": "龙里县",
            "parent_id": "522700",
            "level": "3",
            "full_name": "贵州省-黔南布依族苗族自治州-龙里县"
        },
        {
            "id": "522731",
            "name": "惠水县",
            "parent_id": "522700",
            "level": "3",
            "full_name": "贵州省-黔南布依族苗族自治州-惠水县"
        },
        {
            "id": "522732",
            "name": "三都水族自治县",
            "parent_id": "522700",
            "level": "3",
            "full_name": "贵州省-黔南布依族苗族自治州-三都水族自治县"
        },
        {
            "id": "530000",
            "name": "云南省",
            "parent_id": "0",
            "level": "1",
            "full_name": "云南省"
        },
        {
            "id": "530100",
            "name": "昆明市",
            "parent_id": "530000",
            "level": "2",
            "full_name": "云南省-昆明市"
        },
        {
            "id": "530101",
            "name": "市辖区",
            "parent_id": "530100",
            "level": "3",
            "full_name": "云南省-昆明市-市辖区"
        },
        {
            "id": "530102",
            "name": "五华区",
            "parent_id": "530100",
            "level": "3",
            "full_name": "云南省-昆明市-五华区"
        },
        {
            "id": "530103",
            "name": "盘龙区",
            "parent_id": "530100",
            "level": "3",
            "full_name": "云南省-昆明市-盘龙区"
        },
        {
            "id": "530111",
            "name": "官渡区",
            "parent_id": "530100",
            "level": "3",
            "full_name": "云南省-昆明市-官渡区"
        },
        {
            "id": "530112",
            "name": "西山区",
            "parent_id": "530100",
            "level": "3",
            "full_name": "云南省-昆明市-西山区"
        },
        {
            "id": "530113",
            "name": "东川区",
            "parent_id": "530100",
            "level": "3",
            "full_name": "云南省-昆明市-东川区"
        },
        {
            "id": "530114",
            "name": "呈贡区",
            "parent_id": "530100",
            "level": "3",
            "full_name": "云南省-昆明市-呈贡区"
        },
        {
            "id": "530122",
            "name": "晋宁县",
            "parent_id": "530100",
            "level": "3",
            "full_name": "云南省-昆明市-晋宁县"
        },
        {
            "id": "530124",
            "name": "富民县",
            "parent_id": "530100",
            "level": "3",
            "full_name": "云南省-昆明市-富民县"
        },
        {
            "id": "530125",
            "name": "宜良县",
            "parent_id": "530100",
            "level": "3",
            "full_name": "云南省-昆明市-宜良县"
        },
        {
            "id": "530126",
            "name": "石林彝族自治县",
            "parent_id": "530100",
            "level": "3",
            "full_name": "云南省-昆明市-石林彝族自治县"
        },
        {
            "id": "530127",
            "name": "嵩明县",
            "parent_id": "530100",
            "level": "3",
            "full_name": "云南省-昆明市-嵩明县"
        },
        {
            "id": "530128",
            "name": "禄劝彝族苗族自治县",
            "parent_id": "530100",
            "level": "3",
            "full_name": "云南省-昆明市-禄劝彝族苗族自治县"
        },
        {
            "id": "530129",
            "name": "寻甸回族彝族自治县",
            "parent_id": "530100",
            "level": "3",
            "full_name": "云南省-昆明市-寻甸回族彝族自治县"
        },
        {
            "id": "530181",
            "name": "安宁市",
            "parent_id": "530100",
            "level": "3",
            "full_name": "云南省-昆明市-安宁市"
        },
        {
            "id": "530300",
            "name": "曲靖市",
            "parent_id": "530000",
            "level": "2",
            "full_name": "云南省-曲靖市"
        },
        {
            "id": "530301",
            "name": "市辖区",
            "parent_id": "530300",
            "level": "3",
            "full_name": "云南省-曲靖市-市辖区"
        },
        {
            "id": "530302",
            "name": "麒麟区",
            "parent_id": "530300",
            "level": "3",
            "full_name": "云南省-曲靖市-麒麟区"
        },
        {
            "id": "530321",
            "name": "马龙县",
            "parent_id": "530300",
            "level": "3",
            "full_name": "云南省-曲靖市-马龙县"
        },
        {
            "id": "530322",
            "name": "陆良县",
            "parent_id": "530300",
            "level": "3",
            "full_name": "云南省-曲靖市-陆良县"
        },
        {
            "id": "530323",
            "name": "师宗县",
            "parent_id": "530300",
            "level": "3",
            "full_name": "云南省-曲靖市-师宗县"
        },
        {
            "id": "530324",
            "name": "罗平县",
            "parent_id": "530300",
            "level": "3",
            "full_name": "云南省-曲靖市-罗平县"
        },
        {
            "id": "530325",
            "name": "富源县",
            "parent_id": "530300",
            "level": "3",
            "full_name": "云南省-曲靖市-富源县"
        },
        {
            "id": "530326",
            "name": "会泽县",
            "parent_id": "530300",
            "level": "3",
            "full_name": "云南省-曲靖市-会泽县"
        },
        {
            "id": "530328",
            "name": "沾益县",
            "parent_id": "530300",
            "level": "3",
            "full_name": "云南省-曲靖市-沾益县"
        },
        {
            "id": "530381",
            "name": "宣威市",
            "parent_id": "530300",
            "level": "3",
            "full_name": "云南省-曲靖市-宣威市"
        },
        {
            "id": "530400",
            "name": "玉溪市",
            "parent_id": "530000",
            "level": "2",
            "full_name": "云南省-玉溪市"
        },
        {
            "id": "530401",
            "name": "市辖区",
            "parent_id": "530400",
            "level": "3",
            "full_name": "云南省-玉溪市-市辖区"
        },
        {
            "id": "530402",
            "name": "红塔区",
            "parent_id": "530400",
            "level": "3",
            "full_name": "云南省-玉溪市-红塔区"
        },
        {
            "id": "530421",
            "name": "江川县",
            "parent_id": "530400",
            "level": "3",
            "full_name": "云南省-玉溪市-江川县"
        },
        {
            "id": "530422",
            "name": "澄江县",
            "parent_id": "530400",
            "level": "3",
            "full_name": "云南省-玉溪市-澄江县"
        },
        {
            "id": "530423",
            "name": "通海县",
            "parent_id": "530400",
            "level": "3",
            "full_name": "云南省-玉溪市-通海县"
        },
        {
            "id": "530424",
            "name": "华宁县",
            "parent_id": "530400",
            "level": "3",
            "full_name": "云南省-玉溪市-华宁县"
        },
        {
            "id": "530425",
            "name": "易门县",
            "parent_id": "530400",
            "level": "3",
            "full_name": "云南省-玉溪市-易门县"
        },
        {
            "id": "530426",
            "name": "峨山彝族自治县",
            "parent_id": "530400",
            "level": "3",
            "full_name": "云南省-玉溪市-峨山彝族自治县"
        },
        {
            "id": "530427",
            "name": "新平彝族傣族自治县",
            "parent_id": "530400",
            "level": "3",
            "full_name": "云南省-玉溪市-新平彝族傣族自治县"
        },
        {
            "id": "530428",
            "name": "元江哈尼族彝族傣族自治县",
            "parent_id": "530400",
            "level": "3",
            "full_name": "云南省-玉溪市-元江哈尼族彝族傣族自治县"
        },
        {
            "id": "530500",
            "name": "保山市",
            "parent_id": "530000",
            "level": "2",
            "full_name": "云南省-保山市"
        },
        {
            "id": "530501",
            "name": "市辖区",
            "parent_id": "530500",
            "level": "3",
            "full_name": "云南省-保山市-市辖区"
        },
        {
            "id": "530502",
            "name": "隆阳区",
            "parent_id": "530500",
            "level": "3",
            "full_name": "云南省-保山市-隆阳区"
        },
        {
            "id": "530521",
            "name": "施甸县",
            "parent_id": "530500",
            "level": "3",
            "full_name": "云南省-保山市-施甸县"
        },
        {
            "id": "530523",
            "name": "龙陵县",
            "parent_id": "530500",
            "level": "3",
            "full_name": "云南省-保山市-龙陵县"
        },
        {
            "id": "530524",
            "name": "昌宁县",
            "parent_id": "530500",
            "level": "3",
            "full_name": "云南省-保山市-昌宁县"
        },
        {
            "id": "530581",
            "name": "腾冲市",
            "parent_id": "530500",
            "level": "3",
            "full_name": "云南省-保山市-腾冲市"
        },
        {
            "id": "530600",
            "name": "昭通市",
            "parent_id": "530000",
            "level": "2",
            "full_name": "云南省-昭通市"
        },
        {
            "id": "530601",
            "name": "市辖区",
            "parent_id": "530600",
            "level": "3",
            "full_name": "云南省-昭通市-市辖区"
        },
        {
            "id": "530602",
            "name": "昭阳区",
            "parent_id": "530600",
            "level": "3",
            "full_name": "云南省-昭通市-昭阳区"
        },
        {
            "id": "530621",
            "name": "鲁甸县",
            "parent_id": "530600",
            "level": "3",
            "full_name": "云南省-昭通市-鲁甸县"
        },
        {
            "id": "530622",
            "name": "巧家县",
            "parent_id": "530600",
            "level": "3",
            "full_name": "云南省-昭通市-巧家县"
        },
        {
            "id": "530623",
            "name": "盐津县",
            "parent_id": "530600",
            "level": "3",
            "full_name": "云南省-昭通市-盐津县"
        },
        {
            "id": "530624",
            "name": "大关县",
            "parent_id": "530600",
            "level": "3",
            "full_name": "云南省-昭通市-大关县"
        },
        {
            "id": "530625",
            "name": "永善县",
            "parent_id": "530600",
            "level": "3",
            "full_name": "云南省-昭通市-永善县"
        },
        {
            "id": "530626",
            "name": "绥江县",
            "parent_id": "530600",
            "level": "3",
            "full_name": "云南省-昭通市-绥江县"
        },
        {
            "id": "530627",
            "name": "镇雄县",
            "parent_id": "530600",
            "level": "3",
            "full_name": "云南省-昭通市-镇雄县"
        },
        {
            "id": "530628",
            "name": "彝良县",
            "parent_id": "530600",
            "level": "3",
            "full_name": "云南省-昭通市-彝良县"
        },
        {
            "id": "530629",
            "name": "威信县",
            "parent_id": "530600",
            "level": "3",
            "full_name": "云南省-昭通市-威信县"
        },
        {
            "id": "530630",
            "name": "水富县",
            "parent_id": "530600",
            "level": "3",
            "full_name": "云南省-昭通市-水富县"
        },
        {
            "id": "530700",
            "name": "丽江市",
            "parent_id": "530000",
            "level": "2",
            "full_name": "云南省-丽江市"
        },
        {
            "id": "530701",
            "name": "市辖区",
            "parent_id": "530700",
            "level": "3",
            "full_name": "云南省-丽江市-市辖区"
        },
        {
            "id": "530702",
            "name": "古城区",
            "parent_id": "530700",
            "level": "3",
            "full_name": "云南省-丽江市-古城区"
        },
        {
            "id": "530721",
            "name": "玉龙纳西族自治县",
            "parent_id": "530700",
            "level": "3",
            "full_name": "云南省-丽江市-玉龙纳西族自治县"
        },
        {
            "id": "530722",
            "name": "永胜县",
            "parent_id": "530700",
            "level": "3",
            "full_name": "云南省-丽江市-永胜县"
        },
        {
            "id": "530723",
            "name": "华坪县",
            "parent_id": "530700",
            "level": "3",
            "full_name": "云南省-丽江市-华坪县"
        },
        {
            "id": "530724",
            "name": "宁蒗彝族自治县",
            "parent_id": "530700",
            "level": "3",
            "full_name": "云南省-丽江市-宁蒗彝族自治县"
        },
        {
            "id": "530800",
            "name": "普洱市",
            "parent_id": "530000",
            "level": "2",
            "full_name": "云南省-普洱市"
        },
        {
            "id": "530801",
            "name": "市辖区",
            "parent_id": "530800",
            "level": "3",
            "full_name": "云南省-普洱市-市辖区"
        },
        {
            "id": "530802",
            "name": "思茅区",
            "parent_id": "530800",
            "level": "3",
            "full_name": "云南省-普洱市-思茅区"
        },
        {
            "id": "530821",
            "name": "宁洱哈尼族彝族自治县",
            "parent_id": "530800",
            "level": "3",
            "full_name": "云南省-普洱市-宁洱哈尼族彝族自治县"
        },
        {
            "id": "530822",
            "name": "墨江哈尼族自治县",
            "parent_id": "530800",
            "level": "3",
            "full_name": "云南省-普洱市-墨江哈尼族自治县"
        },
        {
            "id": "530823",
            "name": "景东彝族自治县",
            "parent_id": "530800",
            "level": "3",
            "full_name": "云南省-普洱市-景东彝族自治县"
        },
        {
            "id": "530824",
            "name": "景谷傣族彝族自治县",
            "parent_id": "530800",
            "level": "3",
            "full_name": "云南省-普洱市-景谷傣族彝族自治县"
        },
        {
            "id": "530825",
            "name": "镇沅彝族哈尼族拉祜族自治县",
            "parent_id": "530800",
            "level": "3",
            "full_name": "云南省-普洱市-镇沅彝族哈尼族拉祜族自治县"
        },
        {
            "id": "530826",
            "name": "江城哈尼族彝族自治县",
            "parent_id": "530800",
            "level": "3",
            "full_name": "云南省-普洱市-江城哈尼族彝族自治县"
        },
        {
            "id": "530827",
            "name": "孟连傣族拉祜族佤族自治县",
            "parent_id": "530800",
            "level": "3",
            "full_name": "云南省-普洱市-孟连傣族拉祜族佤族自治县"
        },
        {
            "id": "530828",
            "name": "澜沧拉祜族自治县",
            "parent_id": "530800",
            "level": "3",
            "full_name": "云南省-普洱市-澜沧拉祜族自治县"
        },
        {
            "id": "530829",
            "name": "西盟佤族自治县",
            "parent_id": "530800",
            "level": "3",
            "full_name": "云南省-普洱市-西盟佤族自治县"
        },
        {
            "id": "530900",
            "name": "临沧市",
            "parent_id": "530000",
            "level": "2",
            "full_name": "云南省-临沧市"
        },
        {
            "id": "530901",
            "name": "市辖区",
            "parent_id": "530900",
            "level": "3",
            "full_name": "云南省-临沧市-市辖区"
        },
        {
            "id": "530902",
            "name": "临翔区",
            "parent_id": "530900",
            "level": "3",
            "full_name": "云南省-临沧市-临翔区"
        },
        {
            "id": "530921",
            "name": "凤庆县",
            "parent_id": "530900",
            "level": "3",
            "full_name": "云南省-临沧市-凤庆县"
        },
        {
            "id": "530922",
            "name": "云县",
            "parent_id": "530900",
            "level": "3",
            "full_name": "云南省-临沧市-云县"
        },
        {
            "id": "530923",
            "name": "永德县",
            "parent_id": "530900",
            "level": "3",
            "full_name": "云南省-临沧市-永德县"
        },
        {
            "id": "530924",
            "name": "镇康县",
            "parent_id": "530900",
            "level": "3",
            "full_name": "云南省-临沧市-镇康县"
        },
        {
            "id": "530925",
            "name": "双江拉祜族佤族布朗族傣族自治县",
            "parent_id": "530900",
            "level": "3",
            "full_name": "云南省-临沧市-双江拉祜族佤族布朗族傣族自治县"
        },
        {
            "id": "530926",
            "name": "耿马傣族佤族自治县",
            "parent_id": "530900",
            "level": "3",
            "full_name": "云南省-临沧市-耿马傣族佤族自治县"
        },
        {
            "id": "530927",
            "name": "沧源佤族自治县",
            "parent_id": "530900",
            "level": "3",
            "full_name": "云南省-临沧市-沧源佤族自治县"
        },
        {
            "id": "532300",
            "name": "楚雄彝族自治州",
            "parent_id": "530000",
            "level": "2",
            "full_name": "云南省-楚雄彝族自治州"
        },
        {
            "id": "532301",
            "name": "楚雄市",
            "parent_id": "532300",
            "level": "3",
            "full_name": "云南省-楚雄彝族自治州-楚雄市"
        },
        {
            "id": "532322",
            "name": "双柏县",
            "parent_id": "532300",
            "level": "3",
            "full_name": "云南省-楚雄彝族自治州-双柏县"
        },
        {
            "id": "532323",
            "name": "牟定县",
            "parent_id": "532300",
            "level": "3",
            "full_name": "云南省-楚雄彝族自治州-牟定县"
        },
        {
            "id": "532324",
            "name": "南华县",
            "parent_id": "532300",
            "level": "3",
            "full_name": "云南省-楚雄彝族自治州-南华县"
        },
        {
            "id": "532325",
            "name": "姚安县",
            "parent_id": "532300",
            "level": "3",
            "full_name": "云南省-楚雄彝族自治州-姚安县"
        },
        {
            "id": "532326",
            "name": "大姚县",
            "parent_id": "532300",
            "level": "3",
            "full_name": "云南省-楚雄彝族自治州-大姚县"
        },
        {
            "id": "532327",
            "name": "永仁县",
            "parent_id": "532300",
            "level": "3",
            "full_name": "云南省-楚雄彝族自治州-永仁县"
        },
        {
            "id": "532328",
            "name": "元谋县",
            "parent_id": "532300",
            "level": "3",
            "full_name": "云南省-楚雄彝族自治州-元谋县"
        },
        {
            "id": "532329",
            "name": "武定县",
            "parent_id": "532300",
            "level": "3",
            "full_name": "云南省-楚雄彝族自治州-武定县"
        },
        {
            "id": "532331",
            "name": "禄丰县",
            "parent_id": "532300",
            "level": "3",
            "full_name": "云南省-楚雄彝族自治州-禄丰县"
        },
        {
            "id": "532500",
            "name": "红河哈尼族彝族自治州",
            "parent_id": "530000",
            "level": "2",
            "full_name": "云南省-红河哈尼族彝族自治州"
        },
        {
            "id": "532501",
            "name": "个旧市",
            "parent_id": "532500",
            "level": "3",
            "full_name": "云南省-红河哈尼族彝族自治州-个旧市"
        },
        {
            "id": "532502",
            "name": "开远市",
            "parent_id": "532500",
            "level": "3",
            "full_name": "云南省-红河哈尼族彝族自治州-开远市"
        },
        {
            "id": "532503",
            "name": "蒙自市",
            "parent_id": "532500",
            "level": "3",
            "full_name": "云南省-红河哈尼族彝族自治州-蒙自市"
        },
        {
            "id": "532504",
            "name": "弥勒市",
            "parent_id": "532500",
            "level": "3",
            "full_name": "云南省-红河哈尼族彝族自治州-弥勒市"
        },
        {
            "id": "532523",
            "name": "屏边苗族自治县",
            "parent_id": "532500",
            "level": "3",
            "full_name": "云南省-红河哈尼族彝族自治州-屏边苗族自治县"
        },
        {
            "id": "532524",
            "name": "建水县",
            "parent_id": "532500",
            "level": "3",
            "full_name": "云南省-红河哈尼族彝族自治州-建水县"
        },
        {
            "id": "532525",
            "name": "石屏县",
            "parent_id": "532500",
            "level": "3",
            "full_name": "云南省-红河哈尼族彝族自治州-石屏县"
        },
        {
            "id": "532527",
            "name": "泸西县",
            "parent_id": "532500",
            "level": "3",
            "full_name": "云南省-红河哈尼族彝族自治州-泸西县"
        },
        {
            "id": "532528",
            "name": "元阳县",
            "parent_id": "532500",
            "level": "3",
            "full_name": "云南省-红河哈尼族彝族自治州-元阳县"
        },
        {
            "id": "532529",
            "name": "红河县",
            "parent_id": "532500",
            "level": "3",
            "full_name": "云南省-红河哈尼族彝族自治州-红河县"
        },
        {
            "id": "532530",
            "name": "金平苗族瑶族傣族自治县",
            "parent_id": "532500",
            "level": "3",
            "full_name": "云南省-红河哈尼族彝族自治州-金平苗族瑶族傣族自治县"
        },
        {
            "id": "532531",
            "name": "绿春县",
            "parent_id": "532500",
            "level": "3",
            "full_name": "云南省-红河哈尼族彝族自治州-绿春县"
        },
        {
            "id": "532532",
            "name": "河口瑶族自治县",
            "parent_id": "532500",
            "level": "3",
            "full_name": "云南省-红河哈尼族彝族自治州-河口瑶族自治县"
        },
        {
            "id": "532600",
            "name": "文山壮族苗族自治州",
            "parent_id": "530000",
            "level": "2",
            "full_name": "云南省-文山壮族苗族自治州"
        },
        {
            "id": "532601",
            "name": "文山市",
            "parent_id": "532600",
            "level": "3",
            "full_name": "云南省-文山壮族苗族自治州-文山市"
        },
        {
            "id": "532622",
            "name": "砚山县",
            "parent_id": "532600",
            "level": "3",
            "full_name": "云南省-文山壮族苗族自治州-砚山县"
        },
        {
            "id": "532623",
            "name": "西畴县",
            "parent_id": "532600",
            "level": "3",
            "full_name": "云南省-文山壮族苗族自治州-西畴县"
        },
        {
            "id": "532624",
            "name": "麻栗坡县",
            "parent_id": "532600",
            "level": "3",
            "full_name": "云南省-文山壮族苗族自治州-麻栗坡县"
        },
        {
            "id": "532625",
            "name": "马关县",
            "parent_id": "532600",
            "level": "3",
            "full_name": "云南省-文山壮族苗族自治州-马关县"
        },
        {
            "id": "532626",
            "name": "丘北县",
            "parent_id": "532600",
            "level": "3",
            "full_name": "云南省-文山壮族苗族自治州-丘北县"
        },
        {
            "id": "532627",
            "name": "广南县",
            "parent_id": "532600",
            "level": "3",
            "full_name": "云南省-文山壮族苗族自治州-广南县"
        },
        {
            "id": "532628",
            "name": "富宁县",
            "parent_id": "532600",
            "level": "3",
            "full_name": "云南省-文山壮族苗族自治州-富宁县"
        },
        {
            "id": "532800",
            "name": "西双版纳傣族自治州",
            "parent_id": "530000",
            "level": "2",
            "full_name": "云南省-西双版纳傣族自治州"
        },
        {
            "id": "532801",
            "name": "景洪市",
            "parent_id": "532800",
            "level": "3",
            "full_name": "云南省-西双版纳傣族自治州-景洪市"
        },
        {
            "id": "532822",
            "name": "勐海县",
            "parent_id": "532800",
            "level": "3",
            "full_name": "云南省-西双版纳傣族自治州-勐海县"
        },
        {
            "id": "532823",
            "name": "勐腊县",
            "parent_id": "532800",
            "level": "3",
            "full_name": "云南省-西双版纳傣族自治州-勐腊县"
        },
        {
            "id": "532900",
            "name": "大理白族自治州",
            "parent_id": "530000",
            "level": "2",
            "full_name": "云南省-大理白族自治州"
        },
        {
            "id": "532901",
            "name": "大理市",
            "parent_id": "532900",
            "level": "3",
            "full_name": "云南省-大理白族自治州-大理市"
        },
        {
            "id": "532922",
            "name": "漾濞彝族自治县",
            "parent_id": "532900",
            "level": "3",
            "full_name": "云南省-大理白族自治州-漾濞彝族自治县"
        },
        {
            "id": "532923",
            "name": "祥云县",
            "parent_id": "532900",
            "level": "3",
            "full_name": "云南省-大理白族自治州-祥云县"
        },
        {
            "id": "532924",
            "name": "宾川县",
            "parent_id": "532900",
            "level": "3",
            "full_name": "云南省-大理白族自治州-宾川县"
        },
        {
            "id": "532925",
            "name": "弥渡县",
            "parent_id": "532900",
            "level": "3",
            "full_name": "云南省-大理白族自治州-弥渡县"
        },
        {
            "id": "532926",
            "name": "南涧彝族自治县",
            "parent_id": "532900",
            "level": "3",
            "full_name": "云南省-大理白族自治州-南涧彝族自治县"
        },
        {
            "id": "532927",
            "name": "巍山彝族回族自治县",
            "parent_id": "532900",
            "level": "3",
            "full_name": "云南省-大理白族自治州-巍山彝族回族自治县"
        },
        {
            "id": "532928",
            "name": "永平县",
            "parent_id": "532900",
            "level": "3",
            "full_name": "云南省-大理白族自治州-永平县"
        },
        {
            "id": "532929",
            "name": "云龙县",
            "parent_id": "532900",
            "level": "3",
            "full_name": "云南省-大理白族自治州-云龙县"
        },
        {
            "id": "532930",
            "name": "洱源县",
            "parent_id": "532900",
            "level": "3",
            "full_name": "云南省-大理白族自治州-洱源县"
        },
        {
            "id": "532931",
            "name": "剑川县",
            "parent_id": "532900",
            "level": "3",
            "full_name": "云南省-大理白族自治州-剑川县"
        },
        {
            "id": "532932",
            "name": "鹤庆县",
            "parent_id": "532900",
            "level": "3",
            "full_name": "云南省-大理白族自治州-鹤庆县"
        },
        {
            "id": "533100",
            "name": "德宏傣族景颇族自治州",
            "parent_id": "530000",
            "level": "2",
            "full_name": "云南省-德宏傣族景颇族自治州"
        },
        {
            "id": "533102",
            "name": "瑞丽市",
            "parent_id": "533100",
            "level": "3",
            "full_name": "云南省-德宏傣族景颇族自治州-瑞丽市"
        },
        {
            "id": "533103",
            "name": "芒市",
            "parent_id": "533100",
            "level": "3",
            "full_name": "云南省-德宏傣族景颇族自治州-芒市"
        },
        {
            "id": "533122",
            "name": "梁河县",
            "parent_id": "533100",
            "level": "3",
            "full_name": "云南省-德宏傣族景颇族自治州-梁河县"
        },
        {
            "id": "533123",
            "name": "盈江县",
            "parent_id": "533100",
            "level": "3",
            "full_name": "云南省-德宏傣族景颇族自治州-盈江县"
        },
        {
            "id": "533124",
            "name": "陇川县",
            "parent_id": "533100",
            "level": "3",
            "full_name": "云南省-德宏傣族景颇族自治州-陇川县"
        },
        {
            "id": "533300",
            "name": "怒江傈僳族自治州",
            "parent_id": "530000",
            "level": "2",
            "full_name": "云南省-怒江傈僳族自治州"
        },
        {
            "id": "533321",
            "name": "泸水县",
            "parent_id": "533300",
            "level": "3",
            "full_name": "云南省-怒江傈僳族自治州-泸水县"
        },
        {
            "id": "533323",
            "name": "福贡县",
            "parent_id": "533300",
            "level": "3",
            "full_name": "云南省-怒江傈僳族自治州-福贡县"
        },
        {
            "id": "533324",
            "name": "贡山独龙族怒族自治县",
            "parent_id": "533300",
            "level": "3",
            "full_name": "云南省-怒江傈僳族自治州-贡山独龙族怒族自治县"
        },
        {
            "id": "533325",
            "name": "兰坪白族普米族自治县",
            "parent_id": "533300",
            "level": "3",
            "full_name": "云南省-怒江傈僳族自治州-兰坪白族普米族自治县"
        },
        {
            "id": "533400",
            "name": "迪庆藏族自治州",
            "parent_id": "530000",
            "level": "2",
            "full_name": "云南省-迪庆藏族自治州"
        },
        {
            "id": "533401",
            "name": "香格里拉市",
            "parent_id": "533400",
            "level": "3",
            "full_name": "云南省-迪庆藏族自治州-香格里拉市"
        },
        {
            "id": "533422",
            "name": "德钦县",
            "parent_id": "533400",
            "level": "3",
            "full_name": "云南省-迪庆藏族自治州-德钦县"
        },
        {
            "id": "533423",
            "name": "维西傈僳族自治县",
            "parent_id": "533400",
            "level": "3",
            "full_name": "云南省-迪庆藏族自治州-维西傈僳族自治县"
        },
        {
            "id": "540000",
            "name": "西藏自治区",
            "parent_id": "0",
            "level": "1",
            "full_name": "西藏自治区"
        },
        {
            "id": "540100",
            "name": "拉萨市",
            "parent_id": "540000",
            "level": "2",
            "full_name": "西藏自治区-拉萨市"
        },
        {
            "id": "540101",
            "name": "市辖区",
            "parent_id": "540100",
            "level": "3",
            "full_name": "西藏自治区-拉萨市-市辖区"
        },
        {
            "id": "540102",
            "name": "城关区",
            "parent_id": "540100",
            "level": "3",
            "full_name": "西藏自治区-拉萨市-城关区"
        },
        {
            "id": "540121",
            "name": "林周县",
            "parent_id": "540100",
            "level": "3",
            "full_name": "西藏自治区-拉萨市-林周县"
        },
        {
            "id": "540122",
            "name": "当雄县",
            "parent_id": "540100",
            "level": "3",
            "full_name": "西藏自治区-拉萨市-当雄县"
        },
        {
            "id": "540123",
            "name": "尼木县",
            "parent_id": "540100",
            "level": "3",
            "full_name": "西藏自治区-拉萨市-尼木县"
        },
        {
            "id": "540124",
            "name": "曲水县",
            "parent_id": "540100",
            "level": "3",
            "full_name": "西藏自治区-拉萨市-曲水县"
        },
        {
            "id": "540125",
            "name": "堆龙德庆县",
            "parent_id": "540100",
            "level": "3",
            "full_name": "西藏自治区-拉萨市-堆龙德庆县"
        },
        {
            "id": "540126",
            "name": "达孜县",
            "parent_id": "540100",
            "level": "3",
            "full_name": "西藏自治区-拉萨市-达孜县"
        },
        {
            "id": "540127",
            "name": "墨竹工卡县",
            "parent_id": "540100",
            "level": "3",
            "full_name": "西藏自治区-拉萨市-墨竹工卡县"
        },
        {
            "id": "540200",
            "name": "日喀则市",
            "parent_id": "540000",
            "level": "2",
            "full_name": "西藏自治区-日喀则市"
        },
        {
            "id": "540202",
            "name": "桑珠孜区",
            "parent_id": "540200",
            "level": "3",
            "full_name": "西藏自治区-日喀则市-桑珠孜区"
        },
        {
            "id": "540221",
            "name": "南木林县",
            "parent_id": "540200",
            "level": "3",
            "full_name": "西藏自治区-日喀则市-南木林县"
        },
        {
            "id": "540222",
            "name": "江孜县",
            "parent_id": "540200",
            "level": "3",
            "full_name": "西藏自治区-日喀则市-江孜县"
        },
        {
            "id": "540223",
            "name": "定日县",
            "parent_id": "540200",
            "level": "3",
            "full_name": "西藏自治区-日喀则市-定日县"
        },
        {
            "id": "540224",
            "name": "萨迦县",
            "parent_id": "540200",
            "level": "3",
            "full_name": "西藏自治区-日喀则市-萨迦县"
        },
        {
            "id": "540225",
            "name": "拉孜县",
            "parent_id": "540200",
            "level": "3",
            "full_name": "西藏自治区-日喀则市-拉孜县"
        },
        {
            "id": "540226",
            "name": "昂仁县",
            "parent_id": "540200",
            "level": "3",
            "full_name": "西藏自治区-日喀则市-昂仁县"
        },
        {
            "id": "540227",
            "name": "谢通门县",
            "parent_id": "540200",
            "level": "3",
            "full_name": "西藏自治区-日喀则市-谢通门县"
        },
        {
            "id": "540228",
            "name": "白朗县",
            "parent_id": "540200",
            "level": "3",
            "full_name": "西藏自治区-日喀则市-白朗县"
        },
        {
            "id": "540229",
            "name": "仁布县",
            "parent_id": "540200",
            "level": "3",
            "full_name": "西藏自治区-日喀则市-仁布县"
        },
        {
            "id": "540230",
            "name": "康马县",
            "parent_id": "540200",
            "level": "3",
            "full_name": "西藏自治区-日喀则市-康马县"
        },
        {
            "id": "540231",
            "name": "定结县",
            "parent_id": "540200",
            "level": "3",
            "full_name": "西藏自治区-日喀则市-定结县"
        },
        {
            "id": "540232",
            "name": "仲巴县",
            "parent_id": "540200",
            "level": "3",
            "full_name": "西藏自治区-日喀则市-仲巴县"
        },
        {
            "id": "540233",
            "name": "亚东县",
            "parent_id": "540200",
            "level": "3",
            "full_name": "西藏自治区-日喀则市-亚东县"
        },
        {
            "id": "540234",
            "name": "吉隆县",
            "parent_id": "540200",
            "level": "3",
            "full_name": "西藏自治区-日喀则市-吉隆县"
        },
        {
            "id": "540235",
            "name": "聂拉木县",
            "parent_id": "540200",
            "level": "3",
            "full_name": "西藏自治区-日喀则市-聂拉木县"
        },
        {
            "id": "540236",
            "name": "萨嘎县",
            "parent_id": "540200",
            "level": "3",
            "full_name": "西藏自治区-日喀则市-萨嘎县"
        },
        {
            "id": "540237",
            "name": "岗巴县",
            "parent_id": "540200",
            "level": "3",
            "full_name": "西藏自治区-日喀则市-岗巴县"
        },
        {
            "id": "540300",
            "name": "昌都市",
            "parent_id": "540000",
            "level": "2",
            "full_name": "西藏自治区-昌都市"
        },
        {
            "id": "540302",
            "name": "卡若区",
            "parent_id": "540300",
            "level": "3",
            "full_name": "西藏自治区-昌都市-卡若区"
        },
        {
            "id": "540321",
            "name": "江达县",
            "parent_id": "540300",
            "level": "3",
            "full_name": "西藏自治区-昌都市-江达县"
        },
        {
            "id": "540322",
            "name": "贡觉县",
            "parent_id": "540300",
            "level": "3",
            "full_name": "西藏自治区-昌都市-贡觉县"
        },
        {
            "id": "540323",
            "name": "类乌齐县",
            "parent_id": "540300",
            "level": "3",
            "full_name": "西藏自治区-昌都市-类乌齐县"
        },
        {
            "id": "540324",
            "name": "丁青县",
            "parent_id": "540300",
            "level": "3",
            "full_name": "西藏自治区-昌都市-丁青县"
        },
        {
            "id": "540325",
            "name": "察雅县",
            "parent_id": "540300",
            "level": "3",
            "full_name": "西藏自治区-昌都市-察雅县"
        },
        {
            "id": "540326",
            "name": "八宿县",
            "parent_id": "540300",
            "level": "3",
            "full_name": "西藏自治区-昌都市-八宿县"
        },
        {
            "id": "540327",
            "name": "左贡县",
            "parent_id": "540300",
            "level": "3",
            "full_name": "西藏自治区-昌都市-左贡县"
        },
        {
            "id": "540328",
            "name": "芒康县",
            "parent_id": "540300",
            "level": "3",
            "full_name": "西藏自治区-昌都市-芒康县"
        },
        {
            "id": "540329",
            "name": "洛隆县",
            "parent_id": "540300",
            "level": "3",
            "full_name": "西藏自治区-昌都市-洛隆县"
        },
        {
            "id": "540330",
            "name": "边坝县",
            "parent_id": "540300",
            "level": "3",
            "full_name": "西藏自治区-昌都市-边坝县"
        },
        {
            "id": "540400",
            "name": "林芝市",
            "parent_id": "540000",
            "level": "2",
            "full_name": "西藏自治区-林芝市"
        },
        {
            "id": "540402",
            "name": "巴宜区",
            "parent_id": "540400",
            "level": "3",
            "full_name": "西藏自治区-林芝市-巴宜区"
        },
        {
            "id": "540421",
            "name": "工布江达县",
            "parent_id": "540400",
            "level": "3",
            "full_name": "西藏自治区-林芝市-工布江达县"
        },
        {
            "id": "540422",
            "name": "米林县",
            "parent_id": "540400",
            "level": "3",
            "full_name": "西藏自治区-林芝市-米林县"
        },
        {
            "id": "540423",
            "name": "墨脱县",
            "parent_id": "540400",
            "level": "3",
            "full_name": "西藏自治区-林芝市-墨脱县"
        },
        {
            "id": "540424",
            "name": "波密县",
            "parent_id": "540400",
            "level": "3",
            "full_name": "西藏自治区-林芝市-波密县"
        },
        {
            "id": "540425",
            "name": "察隅县",
            "parent_id": "540400",
            "level": "3",
            "full_name": "西藏自治区-林芝市-察隅县"
        },
        {
            "id": "540426",
            "name": "朗县",
            "parent_id": "540400",
            "level": "3",
            "full_name": "西藏自治区-林芝市-朗县"
        },
        {
            "id": "542200",
            "name": "山南地区",
            "parent_id": "540000",
            "level": "2",
            "full_name": "西藏自治区-山南地区"
        },
        {
            "id": "542221",
            "name": "乃东县",
            "parent_id": "542200",
            "level": "3",
            "full_name": "西藏自治区-山南地区-乃东县"
        },
        {
            "id": "542222",
            "name": "扎囊县",
            "parent_id": "542200",
            "level": "3",
            "full_name": "西藏自治区-山南地区-扎囊县"
        },
        {
            "id": "542223",
            "name": "贡嘎县",
            "parent_id": "542200",
            "level": "3",
            "full_name": "西藏自治区-山南地区-贡嘎县"
        },
        {
            "id": "542224",
            "name": "桑日县",
            "parent_id": "542200",
            "level": "3",
            "full_name": "西藏自治区-山南地区-桑日县"
        },
        {
            "id": "542225",
            "name": "琼结县",
            "parent_id": "542200",
            "level": "3",
            "full_name": "西藏自治区-山南地区-琼结县"
        },
        {
            "id": "542226",
            "name": "曲松县",
            "parent_id": "542200",
            "level": "3",
            "full_name": "西藏自治区-山南地区-曲松县"
        },
        {
            "id": "542227",
            "name": "措美县",
            "parent_id": "542200",
            "level": "3",
            "full_name": "西藏自治区-山南地区-措美县"
        },
        {
            "id": "542228",
            "name": "洛扎县",
            "parent_id": "542200",
            "level": "3",
            "full_name": "西藏自治区-山南地区-洛扎县"
        },
        {
            "id": "542229",
            "name": "加查县",
            "parent_id": "542200",
            "level": "3",
            "full_name": "西藏自治区-山南地区-加查县"
        },
        {
            "id": "542231",
            "name": "隆子县",
            "parent_id": "542200",
            "level": "3",
            "full_name": "西藏自治区-山南地区-隆子县"
        },
        {
            "id": "542232",
            "name": "错那县",
            "parent_id": "542200",
            "level": "3",
            "full_name": "西藏自治区-山南地区-错那县"
        },
        {
            "id": "542233",
            "name": "浪卡子县",
            "parent_id": "542200",
            "level": "3",
            "full_name": "西藏自治区-山南地区-浪卡子县"
        },
        {
            "id": "542400",
            "name": "那曲地区",
            "parent_id": "540000",
            "level": "2",
            "full_name": "西藏自治区-那曲地区"
        },
        {
            "id": "542421",
            "name": "那曲县",
            "parent_id": "542400",
            "level": "3",
            "full_name": "西藏自治区-那曲地区-那曲县"
        },
        {
            "id": "542422",
            "name": "嘉黎县",
            "parent_id": "542400",
            "level": "3",
            "full_name": "西藏自治区-那曲地区-嘉黎县"
        },
        {
            "id": "542423",
            "name": "比如县",
            "parent_id": "542400",
            "level": "3",
            "full_name": "西藏自治区-那曲地区-比如县"
        },
        {
            "id": "542424",
            "name": "聂荣县",
            "parent_id": "542400",
            "level": "3",
            "full_name": "西藏自治区-那曲地区-聂荣县"
        },
        {
            "id": "542425",
            "name": "安多县",
            "parent_id": "542400",
            "level": "3",
            "full_name": "西藏自治区-那曲地区-安多县"
        },
        {
            "id": "542426",
            "name": "申扎县",
            "parent_id": "542400",
            "level": "3",
            "full_name": "西藏自治区-那曲地区-申扎县"
        },
        {
            "id": "542427",
            "name": "索县",
            "parent_id": "542400",
            "level": "3",
            "full_name": "西藏自治区-那曲地区-索县"
        },
        {
            "id": "542428",
            "name": "班戈县",
            "parent_id": "542400",
            "level": "3",
            "full_name": "西藏自治区-那曲地区-班戈县"
        },
        {
            "id": "542429",
            "name": "巴青县",
            "parent_id": "542400",
            "level": "3",
            "full_name": "西藏自治区-那曲地区-巴青县"
        },
        {
            "id": "542430",
            "name": "尼玛县",
            "parent_id": "542400",
            "level": "3",
            "full_name": "西藏自治区-那曲地区-尼玛县"
        },
        {
            "id": "542431",
            "name": "双湖县",
            "parent_id": "542400",
            "level": "3",
            "full_name": "西藏自治区-那曲地区-双湖县"
        },
        {
            "id": "542500",
            "name": "阿里地区",
            "parent_id": "540000",
            "level": "2",
            "full_name": "西藏自治区-阿里地区"
        },
        {
            "id": "542521",
            "name": "普兰县",
            "parent_id": "542500",
            "level": "3",
            "full_name": "西藏自治区-阿里地区-普兰县"
        },
        {
            "id": "542522",
            "name": "札达县",
            "parent_id": "542500",
            "level": "3",
            "full_name": "西藏自治区-阿里地区-札达县"
        },
        {
            "id": "542523",
            "name": "噶尔县",
            "parent_id": "542500",
            "level": "3",
            "full_name": "西藏自治区-阿里地区-噶尔县"
        },
        {
            "id": "542524",
            "name": "日土县",
            "parent_id": "542500",
            "level": "3",
            "full_name": "西藏自治区-阿里地区-日土县"
        },
        {
            "id": "542525",
            "name": "革吉县",
            "parent_id": "542500",
            "level": "3",
            "full_name": "西藏自治区-阿里地区-革吉县"
        },
        {
            "id": "542526",
            "name": "改则县",
            "parent_id": "542500",
            "level": "3",
            "full_name": "西藏自治区-阿里地区-改则县"
        },
        {
            "id": "542527",
            "name": "措勤县",
            "parent_id": "542500",
            "level": "3",
            "full_name": "西藏自治区-阿里地区-措勤县"
        },
        {
            "id": "610000",
            "name": "陕西省",
            "parent_id": "0",
            "level": "1",
            "full_name": "陕西省"
        },
        {
            "id": "610100",
            "name": "西安市",
            "parent_id": "610000",
            "level": "2",
            "full_name": "陕西省-西安市"
        },
        {
            "id": "610101",
            "name": "市辖区",
            "parent_id": "610100",
            "level": "3",
            "full_name": "陕西省-西安市-市辖区"
        },
        {
            "id": "610102",
            "name": "新城区",
            "parent_id": "610100",
            "level": "3",
            "full_name": "陕西省-西安市-新城区"
        },
        {
            "id": "610103",
            "name": "碑林区",
            "parent_id": "610100",
            "level": "3",
            "full_name": "陕西省-西安市-碑林区"
        },
        {
            "id": "610104",
            "name": "莲湖区",
            "parent_id": "610100",
            "level": "3",
            "full_name": "陕西省-西安市-莲湖区"
        },
        {
            "id": "610111",
            "name": "灞桥区",
            "parent_id": "610100",
            "level": "3",
            "full_name": "陕西省-西安市-灞桥区"
        },
        {
            "id": "610112",
            "name": "未央区",
            "parent_id": "610100",
            "level": "3",
            "full_name": "陕西省-西安市-未央区"
        },
        {
            "id": "610113",
            "name": "雁塔区",
            "parent_id": "610100",
            "level": "3",
            "full_name": "陕西省-西安市-雁塔区"
        },
        {
            "id": "610114",
            "name": "阎良区",
            "parent_id": "610100",
            "level": "3",
            "full_name": "陕西省-西安市-阎良区"
        },
        {
            "id": "610115",
            "name": "临潼区",
            "parent_id": "610100",
            "level": "3",
            "full_name": "陕西省-西安市-临潼区"
        },
        {
            "id": "610116",
            "name": "长安区",
            "parent_id": "610100",
            "level": "3",
            "full_name": "陕西省-西安市-长安区"
        },
        {
            "id": "610117",
            "name": "高陵区",
            "parent_id": "610100",
            "level": "3",
            "full_name": "陕西省-西安市-高陵区"
        },
        {
            "id": "610122",
            "name": "蓝田县",
            "parent_id": "610100",
            "level": "3",
            "full_name": "陕西省-西安市-蓝田县"
        },
        {
            "id": "610124",
            "name": "周至县",
            "parent_id": "610100",
            "level": "3",
            "full_name": "陕西省-西安市-周至县"
        },
        {
            "id": "610125",
            "name": "户县",
            "parent_id": "610100",
            "level": "3",
            "full_name": "陕西省-西安市-户县"
        },
        {
            "id": "610200",
            "name": "铜川市",
            "parent_id": "610000",
            "level": "2",
            "full_name": "陕西省-铜川市"
        },
        {
            "id": "610201",
            "name": "市辖区",
            "parent_id": "610200",
            "level": "3",
            "full_name": "陕西省-铜川市-市辖区"
        },
        {
            "id": "610202",
            "name": "王益区",
            "parent_id": "610200",
            "level": "3",
            "full_name": "陕西省-铜川市-王益区"
        },
        {
            "id": "610203",
            "name": "印台区",
            "parent_id": "610200",
            "level": "3",
            "full_name": "陕西省-铜川市-印台区"
        },
        {
            "id": "610204",
            "name": "耀州区",
            "parent_id": "610200",
            "level": "3",
            "full_name": "陕西省-铜川市-耀州区"
        },
        {
            "id": "610222",
            "name": "宜君县",
            "parent_id": "610200",
            "level": "3",
            "full_name": "陕西省-铜川市-宜君县"
        },
        {
            "id": "610300",
            "name": "宝鸡市",
            "parent_id": "610000",
            "level": "2",
            "full_name": "陕西省-宝鸡市"
        },
        {
            "id": "610301",
            "name": "市辖区",
            "parent_id": "610300",
            "level": "3",
            "full_name": "陕西省-宝鸡市-市辖区"
        },
        {
            "id": "610302",
            "name": "渭滨区",
            "parent_id": "610300",
            "level": "3",
            "full_name": "陕西省-宝鸡市-渭滨区"
        },
        {
            "id": "610303",
            "name": "金台区",
            "parent_id": "610300",
            "level": "3",
            "full_name": "陕西省-宝鸡市-金台区"
        },
        {
            "id": "610304",
            "name": "陈仓区",
            "parent_id": "610300",
            "level": "3",
            "full_name": "陕西省-宝鸡市-陈仓区"
        },
        {
            "id": "610322",
            "name": "凤翔县",
            "parent_id": "610300",
            "level": "3",
            "full_name": "陕西省-宝鸡市-凤翔县"
        },
        {
            "id": "610323",
            "name": "岐山县",
            "parent_id": "610300",
            "level": "3",
            "full_name": "陕西省-宝鸡市-岐山县"
        },
        {
            "id": "610324",
            "name": "扶风县",
            "parent_id": "610300",
            "level": "3",
            "full_name": "陕西省-宝鸡市-扶风县"
        },
        {
            "id": "610326",
            "name": "眉县",
            "parent_id": "610300",
            "level": "3",
            "full_name": "陕西省-宝鸡市-眉县"
        },
        {
            "id": "610327",
            "name": "陇县",
            "parent_id": "610300",
            "level": "3",
            "full_name": "陕西省-宝鸡市-陇县"
        },
        {
            "id": "610328",
            "name": "千阳县",
            "parent_id": "610300",
            "level": "3",
            "full_name": "陕西省-宝鸡市-千阳县"
        },
        {
            "id": "610329",
            "name": "麟游县",
            "parent_id": "610300",
            "level": "3",
            "full_name": "陕西省-宝鸡市-麟游县"
        },
        {
            "id": "610330",
            "name": "凤县",
            "parent_id": "610300",
            "level": "3",
            "full_name": "陕西省-宝鸡市-凤县"
        },
        {
            "id": "610331",
            "name": "太白县",
            "parent_id": "610300",
            "level": "3",
            "full_name": "陕西省-宝鸡市-太白县"
        },
        {
            "id": "610400",
            "name": "咸阳市",
            "parent_id": "610000",
            "level": "2",
            "full_name": "陕西省-咸阳市"
        },
        {
            "id": "610401",
            "name": "市辖区",
            "parent_id": "610400",
            "level": "3",
            "full_name": "陕西省-咸阳市-市辖区"
        },
        {
            "id": "610402",
            "name": "秦都区",
            "parent_id": "610400",
            "level": "3",
            "full_name": "陕西省-咸阳市-秦都区"
        },
        {
            "id": "610403",
            "name": "杨陵区",
            "parent_id": "610400",
            "level": "3",
            "full_name": "陕西省-咸阳市-杨陵区"
        },
        {
            "id": "610404",
            "name": "渭城区",
            "parent_id": "610400",
            "level": "3",
            "full_name": "陕西省-咸阳市-渭城区"
        },
        {
            "id": "610422",
            "name": "三原县",
            "parent_id": "610400",
            "level": "3",
            "full_name": "陕西省-咸阳市-三原县"
        },
        {
            "id": "610423",
            "name": "泾阳县",
            "parent_id": "610400",
            "level": "3",
            "full_name": "陕西省-咸阳市-泾阳县"
        },
        {
            "id": "610424",
            "name": "乾县",
            "parent_id": "610400",
            "level": "3",
            "full_name": "陕西省-咸阳市-乾县"
        },
        {
            "id": "610425",
            "name": "礼泉县",
            "parent_id": "610400",
            "level": "3",
            "full_name": "陕西省-咸阳市-礼泉县"
        },
        {
            "id": "610426",
            "name": "永寿县",
            "parent_id": "610400",
            "level": "3",
            "full_name": "陕西省-咸阳市-永寿县"
        },
        {
            "id": "610427",
            "name": "彬县",
            "parent_id": "610400",
            "level": "3",
            "full_name": "陕西省-咸阳市-彬县"
        },
        {
            "id": "610428",
            "name": "长武县",
            "parent_id": "610400",
            "level": "3",
            "full_name": "陕西省-咸阳市-长武县"
        },
        {
            "id": "610429",
            "name": "旬邑县",
            "parent_id": "610400",
            "level": "3",
            "full_name": "陕西省-咸阳市-旬邑县"
        },
        {
            "id": "610430",
            "name": "淳化县",
            "parent_id": "610400",
            "level": "3",
            "full_name": "陕西省-咸阳市-淳化县"
        },
        {
            "id": "610431",
            "name": "武功县",
            "parent_id": "610400",
            "level": "3",
            "full_name": "陕西省-咸阳市-武功县"
        },
        {
            "id": "610481",
            "name": "兴平市",
            "parent_id": "610400",
            "level": "3",
            "full_name": "陕西省-咸阳市-兴平市"
        },
        {
            "id": "610500",
            "name": "渭南市",
            "parent_id": "610000",
            "level": "2",
            "full_name": "陕西省-渭南市"
        },
        {
            "id": "610501",
            "name": "市辖区",
            "parent_id": "610500",
            "level": "3",
            "full_name": "陕西省-渭南市-市辖区"
        },
        {
            "id": "610502",
            "name": "临渭区",
            "parent_id": "610500",
            "level": "3",
            "full_name": "陕西省-渭南市-临渭区"
        },
        {
            "id": "610521",
            "name": "华县",
            "parent_id": "610500",
            "level": "3",
            "full_name": "陕西省-渭南市-华县"
        },
        {
            "id": "610522",
            "name": "潼关县",
            "parent_id": "610500",
            "level": "3",
            "full_name": "陕西省-渭南市-潼关县"
        },
        {
            "id": "610523",
            "name": "大荔县",
            "parent_id": "610500",
            "level": "3",
            "full_name": "陕西省-渭南市-大荔县"
        },
        {
            "id": "610524",
            "name": "合阳县",
            "parent_id": "610500",
            "level": "3",
            "full_name": "陕西省-渭南市-合阳县"
        },
        {
            "id": "610525",
            "name": "澄城县",
            "parent_id": "610500",
            "level": "3",
            "full_name": "陕西省-渭南市-澄城县"
        },
        {
            "id": "610526",
            "name": "蒲城县",
            "parent_id": "610500",
            "level": "3",
            "full_name": "陕西省-渭南市-蒲城县"
        },
        {
            "id": "610527",
            "name": "白水县",
            "parent_id": "610500",
            "level": "3",
            "full_name": "陕西省-渭南市-白水县"
        },
        {
            "id": "610528",
            "name": "富平县",
            "parent_id": "610500",
            "level": "3",
            "full_name": "陕西省-渭南市-富平县"
        },
        {
            "id": "610581",
            "name": "韩城市",
            "parent_id": "610500",
            "level": "3",
            "full_name": "陕西省-渭南市-韩城市"
        },
        {
            "id": "610582",
            "name": "华阴市",
            "parent_id": "610500",
            "level": "3",
            "full_name": "陕西省-渭南市-华阴市"
        },
        {
            "id": "610600",
            "name": "延安市",
            "parent_id": "610000",
            "level": "2",
            "full_name": "陕西省-延安市"
        },
        {
            "id": "610601",
            "name": "市辖区",
            "parent_id": "610600",
            "level": "3",
            "full_name": "陕西省-延安市-市辖区"
        },
        {
            "id": "610602",
            "name": "宝塔区",
            "parent_id": "610600",
            "level": "3",
            "full_name": "陕西省-延安市-宝塔区"
        },
        {
            "id": "610621",
            "name": "延长县",
            "parent_id": "610600",
            "level": "3",
            "full_name": "陕西省-延安市-延长县"
        },
        {
            "id": "610622",
            "name": "延川县",
            "parent_id": "610600",
            "level": "3",
            "full_name": "陕西省-延安市-延川县"
        },
        {
            "id": "610623",
            "name": "子长县",
            "parent_id": "610600",
            "level": "3",
            "full_name": "陕西省-延安市-子长县"
        },
        {
            "id": "610624",
            "name": "安塞县",
            "parent_id": "610600",
            "level": "3",
            "full_name": "陕西省-延安市-安塞县"
        },
        {
            "id": "610625",
            "name": "志丹县",
            "parent_id": "610600",
            "level": "3",
            "full_name": "陕西省-延安市-志丹县"
        },
        {
            "id": "610626",
            "name": "吴起县",
            "parent_id": "610600",
            "level": "3",
            "full_name": "陕西省-延安市-吴起县"
        },
        {
            "id": "610627",
            "name": "甘泉县",
            "parent_id": "610600",
            "level": "3",
            "full_name": "陕西省-延安市-甘泉县"
        },
        {
            "id": "610628",
            "name": "富县",
            "parent_id": "610600",
            "level": "3",
            "full_name": "陕西省-延安市-富县"
        },
        {
            "id": "610629",
            "name": "洛川县",
            "parent_id": "610600",
            "level": "3",
            "full_name": "陕西省-延安市-洛川县"
        },
        {
            "id": "610630",
            "name": "宜川县",
            "parent_id": "610600",
            "level": "3",
            "full_name": "陕西省-延安市-宜川县"
        },
        {
            "id": "610631",
            "name": "黄龙县",
            "parent_id": "610600",
            "level": "3",
            "full_name": "陕西省-延安市-黄龙县"
        },
        {
            "id": "610632",
            "name": "黄陵县",
            "parent_id": "610600",
            "level": "3",
            "full_name": "陕西省-延安市-黄陵县"
        },
        {
            "id": "610700",
            "name": "汉中市",
            "parent_id": "610000",
            "level": "2",
            "full_name": "陕西省-汉中市"
        },
        {
            "id": "610701",
            "name": "市辖区",
            "parent_id": "610700",
            "level": "3",
            "full_name": "陕西省-汉中市-市辖区"
        },
        {
            "id": "610702",
            "name": "汉台区",
            "parent_id": "610700",
            "level": "3",
            "full_name": "陕西省-汉中市-汉台区"
        },
        {
            "id": "610721",
            "name": "南郑县",
            "parent_id": "610700",
            "level": "3",
            "full_name": "陕西省-汉中市-南郑县"
        },
        {
            "id": "610722",
            "name": "城固县",
            "parent_id": "610700",
            "level": "3",
            "full_name": "陕西省-汉中市-城固县"
        },
        {
            "id": "610723",
            "name": "洋县",
            "parent_id": "610700",
            "level": "3",
            "full_name": "陕西省-汉中市-洋县"
        },
        {
            "id": "610724",
            "name": "西乡县",
            "parent_id": "610700",
            "level": "3",
            "full_name": "陕西省-汉中市-西乡县"
        },
        {
            "id": "610725",
            "name": "勉县",
            "parent_id": "610700",
            "level": "3",
            "full_name": "陕西省-汉中市-勉县"
        },
        {
            "id": "610726",
            "name": "宁强县",
            "parent_id": "610700",
            "level": "3",
            "full_name": "陕西省-汉中市-宁强县"
        },
        {
            "id": "610727",
            "name": "略阳县",
            "parent_id": "610700",
            "level": "3",
            "full_name": "陕西省-汉中市-略阳县"
        },
        {
            "id": "610728",
            "name": "镇巴县",
            "parent_id": "610700",
            "level": "3",
            "full_name": "陕西省-汉中市-镇巴县"
        },
        {
            "id": "610729",
            "name": "留坝县",
            "parent_id": "610700",
            "level": "3",
            "full_name": "陕西省-汉中市-留坝县"
        },
        {
            "id": "610730",
            "name": "佛坪县",
            "parent_id": "610700",
            "level": "3",
            "full_name": "陕西省-汉中市-佛坪县"
        },
        {
            "id": "610800",
            "name": "榆林市",
            "parent_id": "610000",
            "level": "2",
            "full_name": "陕西省-榆林市"
        },
        {
            "id": "610801",
            "name": "市辖区",
            "parent_id": "610800",
            "level": "3",
            "full_name": "陕西省-榆林市-市辖区"
        },
        {
            "id": "610802",
            "name": "榆阳区",
            "parent_id": "610800",
            "level": "3",
            "full_name": "陕西省-榆林市-榆阳区"
        },
        {
            "id": "610821",
            "name": "神木县",
            "parent_id": "610800",
            "level": "3",
            "full_name": "陕西省-榆林市-神木县"
        },
        {
            "id": "610822",
            "name": "府谷县",
            "parent_id": "610800",
            "level": "3",
            "full_name": "陕西省-榆林市-府谷县"
        },
        {
            "id": "610823",
            "name": "横山县",
            "parent_id": "610800",
            "level": "3",
            "full_name": "陕西省-榆林市-横山县"
        },
        {
            "id": "610824",
            "name": "靖边县",
            "parent_id": "610800",
            "level": "3",
            "full_name": "陕西省-榆林市-靖边县"
        },
        {
            "id": "610825",
            "name": "定边县",
            "parent_id": "610800",
            "level": "3",
            "full_name": "陕西省-榆林市-定边县"
        },
        {
            "id": "610826",
            "name": "绥德县",
            "parent_id": "610800",
            "level": "3",
            "full_name": "陕西省-榆林市-绥德县"
        },
        {
            "id": "610827",
            "name": "米脂县",
            "parent_id": "610800",
            "level": "3",
            "full_name": "陕西省-榆林市-米脂县"
        },
        {
            "id": "610828",
            "name": "佳县",
            "parent_id": "610800",
            "level": "3",
            "full_name": "陕西省-榆林市-佳县"
        },
        {
            "id": "610829",
            "name": "吴堡县",
            "parent_id": "610800",
            "level": "3",
            "full_name": "陕西省-榆林市-吴堡县"
        },
        {
            "id": "610830",
            "name": "清涧县",
            "parent_id": "610800",
            "level": "3",
            "full_name": "陕西省-榆林市-清涧县"
        },
        {
            "id": "610831",
            "name": "子洲县",
            "parent_id": "610800",
            "level": "3",
            "full_name": "陕西省-榆林市-子洲县"
        },
        {
            "id": "610900",
            "name": "安康市",
            "parent_id": "610000",
            "level": "2",
            "full_name": "陕西省-安康市"
        },
        {
            "id": "610901",
            "name": "市辖区",
            "parent_id": "610900",
            "level": "3",
            "full_name": "陕西省-安康市-市辖区"
        },
        {
            "id": "610902",
            "name": "汉滨区",
            "parent_id": "610900",
            "level": "3",
            "full_name": "陕西省-安康市-汉滨区"
        },
        {
            "id": "610921",
            "name": "汉阴县",
            "parent_id": "610900",
            "level": "3",
            "full_name": "陕西省-安康市-汉阴县"
        },
        {
            "id": "610922",
            "name": "石泉县",
            "parent_id": "610900",
            "level": "3",
            "full_name": "陕西省-安康市-石泉县"
        },
        {
            "id": "610923",
            "name": "宁陕县",
            "parent_id": "610900",
            "level": "3",
            "full_name": "陕西省-安康市-宁陕县"
        },
        {
            "id": "610924",
            "name": "紫阳县",
            "parent_id": "610900",
            "level": "3",
            "full_name": "陕西省-安康市-紫阳县"
        },
        {
            "id": "610925",
            "name": "岚皋县",
            "parent_id": "610900",
            "level": "3",
            "full_name": "陕西省-安康市-岚皋县"
        },
        {
            "id": "610926",
            "name": "平利县",
            "parent_id": "610900",
            "level": "3",
            "full_name": "陕西省-安康市-平利县"
        },
        {
            "id": "610927",
            "name": "镇坪县",
            "parent_id": "610900",
            "level": "3",
            "full_name": "陕西省-安康市-镇坪县"
        },
        {
            "id": "610928",
            "name": "旬阳县",
            "parent_id": "610900",
            "level": "3",
            "full_name": "陕西省-安康市-旬阳县"
        },
        {
            "id": "610929",
            "name": "白河县",
            "parent_id": "610900",
            "level": "3",
            "full_name": "陕西省-安康市-白河县"
        },
        {
            "id": "611000",
            "name": "商洛市",
            "parent_id": "610000",
            "level": "2",
            "full_name": "陕西省-商洛市"
        },
        {
            "id": "611001",
            "name": "市辖区",
            "parent_id": "611000",
            "level": "3",
            "full_name": "陕西省-商洛市-市辖区"
        },
        {
            "id": "611002",
            "name": "商州区",
            "parent_id": "611000",
            "level": "3",
            "full_name": "陕西省-商洛市-商州区"
        },
        {
            "id": "611021",
            "name": "洛南县",
            "parent_id": "611000",
            "level": "3",
            "full_name": "陕西省-商洛市-洛南县"
        },
        {
            "id": "611022",
            "name": "丹凤县",
            "parent_id": "611000",
            "level": "3",
            "full_name": "陕西省-商洛市-丹凤县"
        },
        {
            "id": "611023",
            "name": "商南县",
            "parent_id": "611000",
            "level": "3",
            "full_name": "陕西省-商洛市-商南县"
        },
        {
            "id": "611024",
            "name": "山阳县",
            "parent_id": "611000",
            "level": "3",
            "full_name": "陕西省-商洛市-山阳县"
        },
        {
            "id": "611025",
            "name": "镇安县",
            "parent_id": "611000",
            "level": "3",
            "full_name": "陕西省-商洛市-镇安县"
        },
        {
            "id": "611026",
            "name": "柞水县",
            "parent_id": "611000",
            "level": "3",
            "full_name": "陕西省-商洛市-柞水县"
        },
        {
            "id": "620000",
            "name": "甘肃省",
            "parent_id": "0",
            "level": "1",
            "full_name": "甘肃省"
        },
        {
            "id": "620100",
            "name": "兰州市",
            "parent_id": "620000",
            "level": "2",
            "full_name": "甘肃省-兰州市"
        },
        {
            "id": "620101",
            "name": "市辖区",
            "parent_id": "620100",
            "level": "3",
            "full_name": "甘肃省-兰州市-市辖区"
        },
        {
            "id": "620102",
            "name": "城关区",
            "parent_id": "620100",
            "level": "3",
            "full_name": "甘肃省-兰州市-城关区"
        },
        {
            "id": "620103",
            "name": "七里河区",
            "parent_id": "620100",
            "level": "3",
            "full_name": "甘肃省-兰州市-七里河区"
        },
        {
            "id": "620104",
            "name": "西固区",
            "parent_id": "620100",
            "level": "3",
            "full_name": "甘肃省-兰州市-西固区"
        },
        {
            "id": "620105",
            "name": "安宁区",
            "parent_id": "620100",
            "level": "3",
            "full_name": "甘肃省-兰州市-安宁区"
        },
        {
            "id": "620111",
            "name": "红古区",
            "parent_id": "620100",
            "level": "3",
            "full_name": "甘肃省-兰州市-红古区"
        },
        {
            "id": "620121",
            "name": "永登县",
            "parent_id": "620100",
            "level": "3",
            "full_name": "甘肃省-兰州市-永登县"
        },
        {
            "id": "620122",
            "name": "皋兰县",
            "parent_id": "620100",
            "level": "3",
            "full_name": "甘肃省-兰州市-皋兰县"
        },
        {
            "id": "620123",
            "name": "榆中县",
            "parent_id": "620100",
            "level": "3",
            "full_name": "甘肃省-兰州市-榆中县"
        },
        {
            "id": "620200",
            "name": "嘉峪关市",
            "parent_id": "620000",
            "level": "2",
            "full_name": "甘肃省-嘉峪关市"
        },
        {
            "id": "620201",
            "name": "市辖区",
            "parent_id": "620200",
            "level": "3",
            "full_name": "甘肃省-嘉峪关市-市辖区"
        },
        {
            "id": "620300",
            "name": "金昌市",
            "parent_id": "620000",
            "level": "2",
            "full_name": "甘肃省-金昌市"
        },
        {
            "id": "620301",
            "name": "市辖区",
            "parent_id": "620300",
            "level": "3",
            "full_name": "甘肃省-金昌市-市辖区"
        },
        {
            "id": "620302",
            "name": "金川区",
            "parent_id": "620300",
            "level": "3",
            "full_name": "甘肃省-金昌市-金川区"
        },
        {
            "id": "620321",
            "name": "永昌县",
            "parent_id": "620300",
            "level": "3",
            "full_name": "甘肃省-金昌市-永昌县"
        },
        {
            "id": "620400",
            "name": "白银市",
            "parent_id": "620000",
            "level": "2",
            "full_name": "甘肃省-白银市"
        },
        {
            "id": "620401",
            "name": "市辖区",
            "parent_id": "620400",
            "level": "3",
            "full_name": "甘肃省-白银市-市辖区"
        },
        {
            "id": "620402",
            "name": "白银区",
            "parent_id": "620400",
            "level": "3",
            "full_name": "甘肃省-白银市-白银区"
        },
        {
            "id": "620403",
            "name": "平川区",
            "parent_id": "620400",
            "level": "3",
            "full_name": "甘肃省-白银市-平川区"
        },
        {
            "id": "620421",
            "name": "靖远县",
            "parent_id": "620400",
            "level": "3",
            "full_name": "甘肃省-白银市-靖远县"
        },
        {
            "id": "620422",
            "name": "会宁县",
            "parent_id": "620400",
            "level": "3",
            "full_name": "甘肃省-白银市-会宁县"
        },
        {
            "id": "620423",
            "name": "景泰县",
            "parent_id": "620400",
            "level": "3",
            "full_name": "甘肃省-白银市-景泰县"
        },
        {
            "id": "620500",
            "name": "天水市",
            "parent_id": "620000",
            "level": "2",
            "full_name": "甘肃省-天水市"
        },
        {
            "id": "620501",
            "name": "市辖区",
            "parent_id": "620500",
            "level": "3",
            "full_name": "甘肃省-天水市-市辖区"
        },
        {
            "id": "620502",
            "name": "秦州区",
            "parent_id": "620500",
            "level": "3",
            "full_name": "甘肃省-天水市-秦州区"
        },
        {
            "id": "620503",
            "name": "麦积区",
            "parent_id": "620500",
            "level": "3",
            "full_name": "甘肃省-天水市-麦积区"
        },
        {
            "id": "620521",
            "name": "清水县",
            "parent_id": "620500",
            "level": "3",
            "full_name": "甘肃省-天水市-清水县"
        },
        {
            "id": "620522",
            "name": "秦安县",
            "parent_id": "620500",
            "level": "3",
            "full_name": "甘肃省-天水市-秦安县"
        },
        {
            "id": "620523",
            "name": "甘谷县",
            "parent_id": "620500",
            "level": "3",
            "full_name": "甘肃省-天水市-甘谷县"
        },
        {
            "id": "620524",
            "name": "武山县",
            "parent_id": "620500",
            "level": "3",
            "full_name": "甘肃省-天水市-武山县"
        },
        {
            "id": "620525",
            "name": "张家川回族自治县",
            "parent_id": "620500",
            "level": "3",
            "full_name": "甘肃省-天水市-张家川回族自治县"
        },
        {
            "id": "620600",
            "name": "武威市",
            "parent_id": "620000",
            "level": "2",
            "full_name": "甘肃省-武威市"
        },
        {
            "id": "620601",
            "name": "市辖区",
            "parent_id": "620600",
            "level": "3",
            "full_name": "甘肃省-武威市-市辖区"
        },
        {
            "id": "620602",
            "name": "凉州区",
            "parent_id": "620600",
            "level": "3",
            "full_name": "甘肃省-武威市-凉州区"
        },
        {
            "id": "620621",
            "name": "民勤县",
            "parent_id": "620600",
            "level": "3",
            "full_name": "甘肃省-武威市-民勤县"
        },
        {
            "id": "620622",
            "name": "古浪县",
            "parent_id": "620600",
            "level": "3",
            "full_name": "甘肃省-武威市-古浪县"
        },
        {
            "id": "620623",
            "name": "天祝藏族自治县",
            "parent_id": "620600",
            "level": "3",
            "full_name": "甘肃省-武威市-天祝藏族自治县"
        },
        {
            "id": "620700",
            "name": "张掖市",
            "parent_id": "620000",
            "level": "2",
            "full_name": "甘肃省-张掖市"
        },
        {
            "id": "620701",
            "name": "市辖区",
            "parent_id": "620700",
            "level": "3",
            "full_name": "甘肃省-张掖市-市辖区"
        },
        {
            "id": "620702",
            "name": "甘州区",
            "parent_id": "620700",
            "level": "3",
            "full_name": "甘肃省-张掖市-甘州区"
        },
        {
            "id": "620721",
            "name": "肃南裕固族自治县",
            "parent_id": "620700",
            "level": "3",
            "full_name": "甘肃省-张掖市-肃南裕固族自治县"
        },
        {
            "id": "620722",
            "name": "民乐县",
            "parent_id": "620700",
            "level": "3",
            "full_name": "甘肃省-张掖市-民乐县"
        },
        {
            "id": "620723",
            "name": "临泽县",
            "parent_id": "620700",
            "level": "3",
            "full_name": "甘肃省-张掖市-临泽县"
        },
        {
            "id": "620724",
            "name": "高台县",
            "parent_id": "620700",
            "level": "3",
            "full_name": "甘肃省-张掖市-高台县"
        },
        {
            "id": "620725",
            "name": "山丹县",
            "parent_id": "620700",
            "level": "3",
            "full_name": "甘肃省-张掖市-山丹县"
        },
        {
            "id": "620800",
            "name": "平凉市",
            "parent_id": "620000",
            "level": "2",
            "full_name": "甘肃省-平凉市"
        },
        {
            "id": "620801",
            "name": "市辖区",
            "parent_id": "620800",
            "level": "3",
            "full_name": "甘肃省-平凉市-市辖区"
        },
        {
            "id": "620802",
            "name": "崆峒区",
            "parent_id": "620800",
            "level": "3",
            "full_name": "甘肃省-平凉市-崆峒区"
        },
        {
            "id": "620821",
            "name": "泾川县",
            "parent_id": "620800",
            "level": "3",
            "full_name": "甘肃省-平凉市-泾川县"
        },
        {
            "id": "620822",
            "name": "灵台县",
            "parent_id": "620800",
            "level": "3",
            "full_name": "甘肃省-平凉市-灵台县"
        },
        {
            "id": "620823",
            "name": "崇信县",
            "parent_id": "620800",
            "level": "3",
            "full_name": "甘肃省-平凉市-崇信县"
        },
        {
            "id": "620824",
            "name": "华亭县",
            "parent_id": "620800",
            "level": "3",
            "full_name": "甘肃省-平凉市-华亭县"
        },
        {
            "id": "620825",
            "name": "庄浪县",
            "parent_id": "620800",
            "level": "3",
            "full_name": "甘肃省-平凉市-庄浪县"
        },
        {
            "id": "620826",
            "name": "静宁县",
            "parent_id": "620800",
            "level": "3",
            "full_name": "甘肃省-平凉市-静宁县"
        },
        {
            "id": "620900",
            "name": "酒泉市",
            "parent_id": "620000",
            "level": "2",
            "full_name": "甘肃省-酒泉市"
        },
        {
            "id": "620901",
            "name": "市辖区",
            "parent_id": "620900",
            "level": "3",
            "full_name": "甘肃省-酒泉市-市辖区"
        },
        {
            "id": "620902",
            "name": "肃州区",
            "parent_id": "620900",
            "level": "3",
            "full_name": "甘肃省-酒泉市-肃州区"
        },
        {
            "id": "620921",
            "name": "金塔县",
            "parent_id": "620900",
            "level": "3",
            "full_name": "甘肃省-酒泉市-金塔县"
        },
        {
            "id": "620922",
            "name": "瓜州县",
            "parent_id": "620900",
            "level": "3",
            "full_name": "甘肃省-酒泉市-瓜州县"
        },
        {
            "id": "620923",
            "name": "肃北蒙古族自治县",
            "parent_id": "620900",
            "level": "3",
            "full_name": "甘肃省-酒泉市-肃北蒙古族自治县"
        },
        {
            "id": "620924",
            "name": "阿克塞哈萨克族自治县",
            "parent_id": "620900",
            "level": "3",
            "full_name": "甘肃省-酒泉市-阿克塞哈萨克族自治县"
        },
        {
            "id": "620981",
            "name": "玉门市",
            "parent_id": "620900",
            "level": "3",
            "full_name": "甘肃省-酒泉市-玉门市"
        },
        {
            "id": "620982",
            "name": "敦煌市",
            "parent_id": "620900",
            "level": "3",
            "full_name": "甘肃省-酒泉市-敦煌市"
        },
        {
            "id": "621000",
            "name": "庆阳市",
            "parent_id": "620000",
            "level": "2",
            "full_name": "甘肃省-庆阳市"
        },
        {
            "id": "621001",
            "name": "市辖区",
            "parent_id": "621000",
            "level": "3",
            "full_name": "甘肃省-庆阳市-市辖区"
        },
        {
            "id": "621002",
            "name": "西峰区",
            "parent_id": "621000",
            "level": "3",
            "full_name": "甘肃省-庆阳市-西峰区"
        },
        {
            "id": "621021",
            "name": "庆城县",
            "parent_id": "621000",
            "level": "3",
            "full_name": "甘肃省-庆阳市-庆城县"
        },
        {
            "id": "621022",
            "name": "环县",
            "parent_id": "621000",
            "level": "3",
            "full_name": "甘肃省-庆阳市-环县"
        },
        {
            "id": "621023",
            "name": "华池县",
            "parent_id": "621000",
            "level": "3",
            "full_name": "甘肃省-庆阳市-华池县"
        },
        {
            "id": "621024",
            "name": "合水县",
            "parent_id": "621000",
            "level": "3",
            "full_name": "甘肃省-庆阳市-合水县"
        },
        {
            "id": "621025",
            "name": "正宁县",
            "parent_id": "621000",
            "level": "3",
            "full_name": "甘肃省-庆阳市-正宁县"
        },
        {
            "id": "621026",
            "name": "宁县",
            "parent_id": "621000",
            "level": "3",
            "full_name": "甘肃省-庆阳市-宁县"
        },
        {
            "id": "621027",
            "name": "镇原县",
            "parent_id": "621000",
            "level": "3",
            "full_name": "甘肃省-庆阳市-镇原县"
        },
        {
            "id": "621100",
            "name": "定西市",
            "parent_id": "620000",
            "level": "2",
            "full_name": "甘肃省-定西市"
        },
        {
            "id": "621101",
            "name": "市辖区",
            "parent_id": "621100",
            "level": "3",
            "full_name": "甘肃省-定西市-市辖区"
        },
        {
            "id": "621102",
            "name": "安定区",
            "parent_id": "621100",
            "level": "3",
            "full_name": "甘肃省-定西市-安定区"
        },
        {
            "id": "621121",
            "name": "通渭县",
            "parent_id": "621100",
            "level": "3",
            "full_name": "甘肃省-定西市-通渭县"
        },
        {
            "id": "621122",
            "name": "陇西县",
            "parent_id": "621100",
            "level": "3",
            "full_name": "甘肃省-定西市-陇西县"
        },
        {
            "id": "621123",
            "name": "渭源县",
            "parent_id": "621100",
            "level": "3",
            "full_name": "甘肃省-定西市-渭源县"
        },
        {
            "id": "621124",
            "name": "临洮县",
            "parent_id": "621100",
            "level": "3",
            "full_name": "甘肃省-定西市-临洮县"
        },
        {
            "id": "621125",
            "name": "漳县",
            "parent_id": "621100",
            "level": "3",
            "full_name": "甘肃省-定西市-漳县"
        },
        {
            "id": "621126",
            "name": "岷县",
            "parent_id": "621100",
            "level": "3",
            "full_name": "甘肃省-定西市-岷县"
        },
        {
            "id": "621200",
            "name": "陇南市",
            "parent_id": "620000",
            "level": "2",
            "full_name": "甘肃省-陇南市"
        },
        {
            "id": "621201",
            "name": "市辖区",
            "parent_id": "621200",
            "level": "3",
            "full_name": "甘肃省-陇南市-市辖区"
        },
        {
            "id": "621202",
            "name": "武都区",
            "parent_id": "621200",
            "level": "3",
            "full_name": "甘肃省-陇南市-武都区"
        },
        {
            "id": "621221",
            "name": "成县",
            "parent_id": "621200",
            "level": "3",
            "full_name": "甘肃省-陇南市-成县"
        },
        {
            "id": "621222",
            "name": "文县",
            "parent_id": "621200",
            "level": "3",
            "full_name": "甘肃省-陇南市-文县"
        },
        {
            "id": "621223",
            "name": "宕昌县",
            "parent_id": "621200",
            "level": "3",
            "full_name": "甘肃省-陇南市-宕昌县"
        },
        {
            "id": "621224",
            "name": "康县",
            "parent_id": "621200",
            "level": "3",
            "full_name": "甘肃省-陇南市-康县"
        },
        {
            "id": "621225",
            "name": "西和县",
            "parent_id": "621200",
            "level": "3",
            "full_name": "甘肃省-陇南市-西和县"
        },
        {
            "id": "621226",
            "name": "礼县",
            "parent_id": "621200",
            "level": "3",
            "full_name": "甘肃省-陇南市-礼县"
        },
        {
            "id": "621227",
            "name": "徽县",
            "parent_id": "621200",
            "level": "3",
            "full_name": "甘肃省-陇南市-徽县"
        },
        {
            "id": "621228",
            "name": "两当县",
            "parent_id": "621200",
            "level": "3",
            "full_name": "甘肃省-陇南市-两当县"
        },
        {
            "id": "622900",
            "name": "临夏回族自治州",
            "parent_id": "620000",
            "level": "2",
            "full_name": "甘肃省-临夏回族自治州"
        },
        {
            "id": "622901",
            "name": "临夏市",
            "parent_id": "622900",
            "level": "3",
            "full_name": "甘肃省-临夏回族自治州-临夏市"
        },
        {
            "id": "622921",
            "name": "临夏县",
            "parent_id": "622900",
            "level": "3",
            "full_name": "甘肃省-临夏回族自治州-临夏县"
        },
        {
            "id": "622922",
            "name": "康乐县",
            "parent_id": "622900",
            "level": "3",
            "full_name": "甘肃省-临夏回族自治州-康乐县"
        },
        {
            "id": "622923",
            "name": "永靖县",
            "parent_id": "622900",
            "level": "3",
            "full_name": "甘肃省-临夏回族自治州-永靖县"
        },
        {
            "id": "622924",
            "name": "广河县",
            "parent_id": "622900",
            "level": "3",
            "full_name": "甘肃省-临夏回族自治州-广河县"
        },
        {
            "id": "622925",
            "name": "和政县",
            "parent_id": "622900",
            "level": "3",
            "full_name": "甘肃省-临夏回族自治州-和政县"
        },
        {
            "id": "622926",
            "name": "东乡族自治县",
            "parent_id": "622900",
            "level": "3",
            "full_name": "甘肃省-临夏回族自治州-东乡族自治县"
        },
        {
            "id": "622927",
            "name": "积石山保安族东乡族撒拉族自治县",
            "parent_id": "622900",
            "level": "3",
            "full_name": "甘肃省-临夏回族自治州-积石山保安族东乡族撒拉族自治县"
        },
        {
            "id": "623000",
            "name": "甘南藏族自治州",
            "parent_id": "620000",
            "level": "2",
            "full_name": "甘肃省-甘南藏族自治州"
        },
        {
            "id": "623001",
            "name": "合作市",
            "parent_id": "623000",
            "level": "3",
            "full_name": "甘肃省-甘南藏族自治州-合作市"
        },
        {
            "id": "623021",
            "name": "临潭县",
            "parent_id": "623000",
            "level": "3",
            "full_name": "甘肃省-甘南藏族自治州-临潭县"
        },
        {
            "id": "623022",
            "name": "卓尼县",
            "parent_id": "623000",
            "level": "3",
            "full_name": "甘肃省-甘南藏族自治州-卓尼县"
        },
        {
            "id": "623023",
            "name": "舟曲县",
            "parent_id": "623000",
            "level": "3",
            "full_name": "甘肃省-甘南藏族自治州-舟曲县"
        },
        {
            "id": "623024",
            "name": "迭部县",
            "parent_id": "623000",
            "level": "3",
            "full_name": "甘肃省-甘南藏族自治州-迭部县"
        },
        {
            "id": "623025",
            "name": "玛曲县",
            "parent_id": "623000",
            "level": "3",
            "full_name": "甘肃省-甘南藏族自治州-玛曲县"
        },
        {
            "id": "623026",
            "name": "碌曲县",
            "parent_id": "623000",
            "level": "3",
            "full_name": "甘肃省-甘南藏族自治州-碌曲县"
        },
        {
            "id": "623027",
            "name": "夏河县",
            "parent_id": "623000",
            "level": "3",
            "full_name": "甘肃省-甘南藏族自治州-夏河县"
        },
        {
            "id": "630000",
            "name": "青海省",
            "parent_id": "0",
            "level": "1",
            "full_name": "青海省"
        },
        {
            "id": "630100",
            "name": "西宁市",
            "parent_id": "630000",
            "level": "2",
            "full_name": "青海省-西宁市"
        },
        {
            "id": "630101",
            "name": "市辖区",
            "parent_id": "630100",
            "level": "3",
            "full_name": "青海省-西宁市-市辖区"
        },
        {
            "id": "630102",
            "name": "城东区",
            "parent_id": "630100",
            "level": "3",
            "full_name": "青海省-西宁市-城东区"
        },
        {
            "id": "630103",
            "name": "城中区",
            "parent_id": "630100",
            "level": "3",
            "full_name": "青海省-西宁市-城中区"
        },
        {
            "id": "630104",
            "name": "城西区",
            "parent_id": "630100",
            "level": "3",
            "full_name": "青海省-西宁市-城西区"
        },
        {
            "id": "630105",
            "name": "城北区",
            "parent_id": "630100",
            "level": "3",
            "full_name": "青海省-西宁市-城北区"
        },
        {
            "id": "630121",
            "name": "大通回族土族自治县",
            "parent_id": "630100",
            "level": "3",
            "full_name": "青海省-西宁市-大通回族土族自治县"
        },
        {
            "id": "630122",
            "name": "湟中县",
            "parent_id": "630100",
            "level": "3",
            "full_name": "青海省-西宁市-湟中县"
        },
        {
            "id": "630123",
            "name": "湟源县",
            "parent_id": "630100",
            "level": "3",
            "full_name": "青海省-西宁市-湟源县"
        },
        {
            "id": "630200",
            "name": "海东市",
            "parent_id": "630000",
            "level": "2",
            "full_name": "青海省-海东市"
        },
        {
            "id": "630202",
            "name": "乐都区",
            "parent_id": "630200",
            "level": "3",
            "full_name": "青海省-海东市-乐都区"
        },
        {
            "id": "630203",
            "name": "平安区",
            "parent_id": "630200",
            "level": "3",
            "full_name": "青海省-海东市-平安区"
        },
        {
            "id": "630222",
            "name": "民和回族土族自治县",
            "parent_id": "630200",
            "level": "3",
            "full_name": "青海省-海东市-民和回族土族自治县"
        },
        {
            "id": "630223",
            "name": "互助土族自治县",
            "parent_id": "630200",
            "level": "3",
            "full_name": "青海省-海东市-互助土族自治县"
        },
        {
            "id": "630224",
            "name": "化隆回族自治县",
            "parent_id": "630200",
            "level": "3",
            "full_name": "青海省-海东市-化隆回族自治县"
        },
        {
            "id": "630225",
            "name": "循化撒拉族自治县",
            "parent_id": "630200",
            "level": "3",
            "full_name": "青海省-海东市-循化撒拉族自治县"
        },
        {
            "id": "632200",
            "name": "海北藏族自治州",
            "parent_id": "630000",
            "level": "2",
            "full_name": "青海省-海北藏族自治州"
        },
        {
            "id": "632221",
            "name": "门源回族自治县",
            "parent_id": "632200",
            "level": "3",
            "full_name": "青海省-海北藏族自治州-门源回族自治县"
        },
        {
            "id": "632222",
            "name": "祁连县",
            "parent_id": "632200",
            "level": "3",
            "full_name": "青海省-海北藏族自治州-祁连县"
        },
        {
            "id": "632223",
            "name": "海晏县",
            "parent_id": "632200",
            "level": "3",
            "full_name": "青海省-海北藏族自治州-海晏县"
        },
        {
            "id": "632224",
            "name": "刚察县",
            "parent_id": "632200",
            "level": "3",
            "full_name": "青海省-海北藏族自治州-刚察县"
        },
        {
            "id": "632300",
            "name": "黄南藏族自治州",
            "parent_id": "630000",
            "level": "2",
            "full_name": "青海省-黄南藏族自治州"
        },
        {
            "id": "632321",
            "name": "同仁县",
            "parent_id": "632300",
            "level": "3",
            "full_name": "青海省-黄南藏族自治州-同仁县"
        },
        {
            "id": "632322",
            "name": "尖扎县",
            "parent_id": "632300",
            "level": "3",
            "full_name": "青海省-黄南藏族自治州-尖扎县"
        },
        {
            "id": "632323",
            "name": "泽库县",
            "parent_id": "632300",
            "level": "3",
            "full_name": "青海省-黄南藏族自治州-泽库县"
        },
        {
            "id": "632324",
            "name": "河南蒙古族自治县",
            "parent_id": "632300",
            "level": "3",
            "full_name": "青海省-黄南藏族自治州-河南蒙古族自治县"
        },
        {
            "id": "632500",
            "name": "海南藏族自治州",
            "parent_id": "630000",
            "level": "2",
            "full_name": "青海省-海南藏族自治州"
        },
        {
            "id": "632521",
            "name": "共和县",
            "parent_id": "632500",
            "level": "3",
            "full_name": "青海省-海南藏族自治州-共和县"
        },
        {
            "id": "632522",
            "name": "同德县",
            "parent_id": "632500",
            "level": "3",
            "full_name": "青海省-海南藏族自治州-同德县"
        },
        {
            "id": "632523",
            "name": "贵德县",
            "parent_id": "632500",
            "level": "3",
            "full_name": "青海省-海南藏族自治州-贵德县"
        },
        {
            "id": "632524",
            "name": "兴海县",
            "parent_id": "632500",
            "level": "3",
            "full_name": "青海省-海南藏族自治州-兴海县"
        },
        {
            "id": "632525",
            "name": "贵南县",
            "parent_id": "632500",
            "level": "3",
            "full_name": "青海省-海南藏族自治州-贵南县"
        },
        {
            "id": "632600",
            "name": "果洛藏族自治州",
            "parent_id": "630000",
            "level": "2",
            "full_name": "青海省-果洛藏族自治州"
        },
        {
            "id": "632621",
            "name": "玛沁县",
            "parent_id": "632600",
            "level": "3",
            "full_name": "青海省-果洛藏族自治州-玛沁县"
        },
        {
            "id": "632622",
            "name": "班玛县",
            "parent_id": "632600",
            "level": "3",
            "full_name": "青海省-果洛藏族自治州-班玛县"
        },
        {
            "id": "632623",
            "name": "甘德县",
            "parent_id": "632600",
            "level": "3",
            "full_name": "青海省-果洛藏族自治州-甘德县"
        },
        {
            "id": "632624",
            "name": "达日县",
            "parent_id": "632600",
            "level": "3",
            "full_name": "青海省-果洛藏族自治州-达日县"
        },
        {
            "id": "632625",
            "name": "久治县",
            "parent_id": "632600",
            "level": "3",
            "full_name": "青海省-果洛藏族自治州-久治县"
        },
        {
            "id": "632626",
            "name": "玛多县",
            "parent_id": "632600",
            "level": "3",
            "full_name": "青海省-果洛藏族自治州-玛多县"
        },
        {
            "id": "632700",
            "name": "玉树藏族自治州",
            "parent_id": "630000",
            "level": "2",
            "full_name": "青海省-玉树藏族自治州"
        },
        {
            "id": "632701",
            "name": "玉树市",
            "parent_id": "632700",
            "level": "3",
            "full_name": "青海省-玉树藏族自治州-玉树市"
        },
        {
            "id": "632722",
            "name": "杂多县",
            "parent_id": "632700",
            "level": "3",
            "full_name": "青海省-玉树藏族自治州-杂多县"
        },
        {
            "id": "632723",
            "name": "称多县",
            "parent_id": "632700",
            "level": "3",
            "full_name": "青海省-玉树藏族自治州-称多县"
        },
        {
            "id": "632724",
            "name": "治多县",
            "parent_id": "632700",
            "level": "3",
            "full_name": "青海省-玉树藏族自治州-治多县"
        },
        {
            "id": "632725",
            "name": "囊谦县",
            "parent_id": "632700",
            "level": "3",
            "full_name": "青海省-玉树藏族自治州-囊谦县"
        },
        {
            "id": "632726",
            "name": "曲麻莱县",
            "parent_id": "632700",
            "level": "3",
            "full_name": "青海省-玉树藏族自治州-曲麻莱县"
        },
        {
            "id": "632800",
            "name": "海西蒙古族藏族自治州",
            "parent_id": "630000",
            "level": "2",
            "full_name": "青海省-海西蒙古族藏族自治州"
        },
        {
            "id": "632801",
            "name": "格尔木市",
            "parent_id": "632800",
            "level": "3",
            "full_name": "青海省-海西蒙古族藏族自治州-格尔木市"
        },
        {
            "id": "632802",
            "name": "德令哈市",
            "parent_id": "632800",
            "level": "3",
            "full_name": "青海省-海西蒙古族藏族自治州-德令哈市"
        },
        {
            "id": "632821",
            "name": "乌兰县",
            "parent_id": "632800",
            "level": "3",
            "full_name": "青海省-海西蒙古族藏族自治州-乌兰县"
        },
        {
            "id": "632822",
            "name": "都兰县",
            "parent_id": "632800",
            "level": "3",
            "full_name": "青海省-海西蒙古族藏族自治州-都兰县"
        },
        {
            "id": "632823",
            "name": "天峻县",
            "parent_id": "632800",
            "level": "3",
            "full_name": "青海省-海西蒙古族藏族自治州-天峻县"
        },
        {
            "id": "640000",
            "name": "宁夏回族自治区",
            "parent_id": "0",
            "level": "1",
            "full_name": "宁夏回族自治区"
        },
        {
            "id": "640100",
            "name": "银川市",
            "parent_id": "640000",
            "level": "2",
            "full_name": "宁夏回族自治区-银川市"
        },
        {
            "id": "640101",
            "name": "市辖区",
            "parent_id": "640100",
            "level": "3",
            "full_name": "宁夏回族自治区-银川市-市辖区"
        },
        {
            "id": "640104",
            "name": "兴庆区",
            "parent_id": "640100",
            "level": "3",
            "full_name": "宁夏回族自治区-银川市-兴庆区"
        },
        {
            "id": "640105",
            "name": "西夏区",
            "parent_id": "640100",
            "level": "3",
            "full_name": "宁夏回族自治区-银川市-西夏区"
        },
        {
            "id": "640106",
            "name": "金凤区",
            "parent_id": "640100",
            "level": "3",
            "full_name": "宁夏回族自治区-银川市-金凤区"
        },
        {
            "id": "640121",
            "name": "永宁县",
            "parent_id": "640100",
            "level": "3",
            "full_name": "宁夏回族自治区-银川市-永宁县"
        },
        {
            "id": "640122",
            "name": "贺兰县",
            "parent_id": "640100",
            "level": "3",
            "full_name": "宁夏回族自治区-银川市-贺兰县"
        },
        {
            "id": "640181",
            "name": "灵武市",
            "parent_id": "640100",
            "level": "3",
            "full_name": "宁夏回族自治区-银川市-灵武市"
        },
        {
            "id": "640200",
            "name": "石嘴山市",
            "parent_id": "640000",
            "level": "2",
            "full_name": "宁夏回族自治区-石嘴山市"
        },
        {
            "id": "640201",
            "name": "市辖区",
            "parent_id": "640200",
            "level": "3",
            "full_name": "宁夏回族自治区-石嘴山市-市辖区"
        },
        {
            "id": "640202",
            "name": "大武口区",
            "parent_id": "640200",
            "level": "3",
            "full_name": "宁夏回族自治区-石嘴山市-大武口区"
        },
        {
            "id": "640205",
            "name": "惠农区",
            "parent_id": "640200",
            "level": "3",
            "full_name": "宁夏回族自治区-石嘴山市-惠农区"
        },
        {
            "id": "640221",
            "name": "平罗县",
            "parent_id": "640200",
            "level": "3",
            "full_name": "宁夏回族自治区-石嘴山市-平罗县"
        },
        {
            "id": "640300",
            "name": "吴忠市",
            "parent_id": "640000",
            "level": "2",
            "full_name": "宁夏回族自治区-吴忠市"
        },
        {
            "id": "640301",
            "name": "市辖区",
            "parent_id": "640300",
            "level": "3",
            "full_name": "宁夏回族自治区-吴忠市-市辖区"
        },
        {
            "id": "640302",
            "name": "利通区",
            "parent_id": "640300",
            "level": "3",
            "full_name": "宁夏回族自治区-吴忠市-利通区"
        },
        {
            "id": "640303",
            "name": "红寺堡区",
            "parent_id": "640300",
            "level": "3",
            "full_name": "宁夏回族自治区-吴忠市-红寺堡区"
        },
        {
            "id": "640323",
            "name": "盐池县",
            "parent_id": "640300",
            "level": "3",
            "full_name": "宁夏回族自治区-吴忠市-盐池县"
        },
        {
            "id": "640324",
            "name": "同心县",
            "parent_id": "640300",
            "level": "3",
            "full_name": "宁夏回族自治区-吴忠市-同心县"
        },
        {
            "id": "640381",
            "name": "青铜峡市",
            "parent_id": "640300",
            "level": "3",
            "full_name": "宁夏回族自治区-吴忠市-青铜峡市"
        },
        {
            "id": "640400",
            "name": "固原市",
            "parent_id": "640000",
            "level": "2",
            "full_name": "宁夏回族自治区-固原市"
        },
        {
            "id": "640401",
            "name": "市辖区",
            "parent_id": "640400",
            "level": "3",
            "full_name": "宁夏回族自治区-固原市-市辖区"
        },
        {
            "id": "640402",
            "name": "原州区",
            "parent_id": "640400",
            "level": "3",
            "full_name": "宁夏回族自治区-固原市-原州区"
        },
        {
            "id": "640422",
            "name": "西吉县",
            "parent_id": "640400",
            "level": "3",
            "full_name": "宁夏回族自治区-固原市-西吉县"
        },
        {
            "id": "640423",
            "name": "隆德县",
            "parent_id": "640400",
            "level": "3",
            "full_name": "宁夏回族自治区-固原市-隆德县"
        },
        {
            "id": "640424",
            "name": "泾源县",
            "parent_id": "640400",
            "level": "3",
            "full_name": "宁夏回族自治区-固原市-泾源县"
        },
        {
            "id": "640425",
            "name": "彭阳县",
            "parent_id": "640400",
            "level": "3",
            "full_name": "宁夏回族自治区-固原市-彭阳县"
        },
        {
            "id": "640500",
            "name": "中卫市",
            "parent_id": "640000",
            "level": "2",
            "full_name": "宁夏回族自治区-中卫市"
        },
        {
            "id": "640501",
            "name": "市辖区",
            "parent_id": "640500",
            "level": "3",
            "full_name": "宁夏回族自治区-中卫市-市辖区"
        },
        {
            "id": "640502",
            "name": "沙坡头区",
            "parent_id": "640500",
            "level": "3",
            "full_name": "宁夏回族自治区-中卫市-沙坡头区"
        },
        {
            "id": "640521",
            "name": "中宁县",
            "parent_id": "640500",
            "level": "3",
            "full_name": "宁夏回族自治区-中卫市-中宁县"
        },
        {
            "id": "640522",
            "name": "海原县",
            "parent_id": "640500",
            "level": "3",
            "full_name": "宁夏回族自治区-中卫市-海原县"
        },
        {
            "id": "650000",
            "name": "新疆维吾尔自治区",
            "parent_id": "0",
            "level": "1",
            "full_name": "新疆维吾尔自治区"
        },
        {
            "id": "650100",
            "name": "乌鲁木齐市",
            "parent_id": "650000",
            "level": "2",
            "full_name": "新疆维吾尔自治区-乌鲁木齐市"
        },
        {
            "id": "650101",
            "name": "市辖区",
            "parent_id": "650100",
            "level": "3",
            "full_name": "新疆维吾尔自治区-乌鲁木齐市-市辖区"
        },
        {
            "id": "650102",
            "name": "天山区",
            "parent_id": "650100",
            "level": "3",
            "full_name": "新疆维吾尔自治区-乌鲁木齐市-天山区"
        },
        {
            "id": "650103",
            "name": "沙依巴克区",
            "parent_id": "650100",
            "level": "3",
            "full_name": "新疆维吾尔自治区-乌鲁木齐市-沙依巴克区"
        },
        {
            "id": "650104",
            "name": "新市区",
            "parent_id": "650100",
            "level": "3",
            "full_name": "新疆维吾尔自治区-乌鲁木齐市-新市区"
        },
        {
            "id": "650105",
            "name": "水磨沟区",
            "parent_id": "650100",
            "level": "3",
            "full_name": "新疆维吾尔自治区-乌鲁木齐市-水磨沟区"
        },
        {
            "id": "650106",
            "name": "头屯河区",
            "parent_id": "650100",
            "level": "3",
            "full_name": "新疆维吾尔自治区-乌鲁木齐市-头屯河区"
        },
        {
            "id": "650107",
            "name": "达坂城区",
            "parent_id": "650100",
            "level": "3",
            "full_name": "新疆维吾尔自治区-乌鲁木齐市-达坂城区"
        },
        {
            "id": "650109",
            "name": "米东区",
            "parent_id": "650100",
            "level": "3",
            "full_name": "新疆维吾尔自治区-乌鲁木齐市-米东区"
        },
        {
            "id": "650121",
            "name": "乌鲁木齐县",
            "parent_id": "650100",
            "level": "3",
            "full_name": "新疆维吾尔自治区-乌鲁木齐市-乌鲁木齐县"
        },
        {
            "id": "650200",
            "name": "克拉玛依市",
            "parent_id": "650000",
            "level": "2",
            "full_name": "新疆维吾尔自治区-克拉玛依市"
        },
        {
            "id": "650201",
            "name": "市辖区",
            "parent_id": "650200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-克拉玛依市-市辖区"
        },
        {
            "id": "650202",
            "name": "独山子区",
            "parent_id": "650200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-克拉玛依市-独山子区"
        },
        {
            "id": "650203",
            "name": "克拉玛依区",
            "parent_id": "650200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-克拉玛依市-克拉玛依区"
        },
        {
            "id": "650204",
            "name": "白碱滩区",
            "parent_id": "650200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-克拉玛依市-白碱滩区"
        },
        {
            "id": "650205",
            "name": "乌尔禾区",
            "parent_id": "650200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-克拉玛依市-乌尔禾区"
        },
        {
            "id": "650400",
            "name": "吐鲁番市",
            "parent_id": "650000",
            "level": "2",
            "full_name": "新疆维吾尔自治区-吐鲁番市"
        },
        {
            "id": "650402",
            "name": "高昌区",
            "parent_id": "650400",
            "level": "3",
            "full_name": "新疆维吾尔自治区-吐鲁番市-高昌区"
        },
        {
            "id": "650421",
            "name": "鄯善县",
            "parent_id": "650400",
            "level": "3",
            "full_name": "新疆维吾尔自治区-吐鲁番市-鄯善县"
        },
        {
            "id": "650422",
            "name": "托克逊县",
            "parent_id": "650400",
            "level": "3",
            "full_name": "新疆维吾尔自治区-吐鲁番市-托克逊县"
        },
        {
            "id": "652200",
            "name": "哈密地区",
            "parent_id": "650000",
            "level": "2",
            "full_name": "新疆维吾尔自治区-哈密地区"
        },
        {
            "id": "652201",
            "name": "哈密市",
            "parent_id": "652200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-哈密地区-哈密市"
        },
        {
            "id": "652222",
            "name": "巴里坤哈萨克自治县",
            "parent_id": "652200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-哈密地区-巴里坤哈萨克自治县"
        },
        {
            "id": "652223",
            "name": "伊吾县",
            "parent_id": "652200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-哈密地区-伊吾县"
        },
        {
            "id": "652300",
            "name": "昌吉回族自治州",
            "parent_id": "650000",
            "level": "2",
            "full_name": "新疆维吾尔自治区-昌吉回族自治州"
        },
        {
            "id": "652301",
            "name": "昌吉市",
            "parent_id": "652300",
            "level": "3",
            "full_name": "新疆维吾尔自治区-昌吉回族自治州-昌吉市"
        },
        {
            "id": "652302",
            "name": "阜康市",
            "parent_id": "652300",
            "level": "3",
            "full_name": "新疆维吾尔自治区-昌吉回族自治州-阜康市"
        },
        {
            "id": "652323",
            "name": "呼图壁县",
            "parent_id": "652300",
            "level": "3",
            "full_name": "新疆维吾尔自治区-昌吉回族自治州-呼图壁县"
        },
        {
            "id": "652324",
            "name": "玛纳斯县",
            "parent_id": "652300",
            "level": "3",
            "full_name": "新疆维吾尔自治区-昌吉回族自治州-玛纳斯县"
        },
        {
            "id": "652325",
            "name": "奇台县",
            "parent_id": "652300",
            "level": "3",
            "full_name": "新疆维吾尔自治区-昌吉回族自治州-奇台县"
        },
        {
            "id": "652327",
            "name": "吉木萨尔县",
            "parent_id": "652300",
            "level": "3",
            "full_name": "新疆维吾尔自治区-昌吉回族自治州-吉木萨尔县"
        },
        {
            "id": "652328",
            "name": "木垒哈萨克自治县",
            "parent_id": "652300",
            "level": "3",
            "full_name": "新疆维吾尔自治区-昌吉回族自治州-木垒哈萨克自治县"
        },
        {
            "id": "652700",
            "name": "博尔塔拉蒙古自治州",
            "parent_id": "650000",
            "level": "2",
            "full_name": "新疆维吾尔自治区-博尔塔拉蒙古自治州"
        },
        {
            "id": "652701",
            "name": "博乐市",
            "parent_id": "652700",
            "level": "3",
            "full_name": "新疆维吾尔自治区-博尔塔拉蒙古自治州-博乐市"
        },
        {
            "id": "652702",
            "name": "阿拉山口市",
            "parent_id": "652700",
            "level": "3",
            "full_name": "新疆维吾尔自治区-博尔塔拉蒙古自治州-阿拉山口市"
        },
        {
            "id": "652722",
            "name": "精河县",
            "parent_id": "652700",
            "level": "3",
            "full_name": "新疆维吾尔自治区-博尔塔拉蒙古自治州-精河县"
        },
        {
            "id": "652723",
            "name": "温泉县",
            "parent_id": "652700",
            "level": "3",
            "full_name": "新疆维吾尔自治区-博尔塔拉蒙古自治州-温泉县"
        },
        {
            "id": "652800",
            "name": "巴音郭楞蒙古自治州",
            "parent_id": "650000",
            "level": "2",
            "full_name": "新疆维吾尔自治区-巴音郭楞蒙古自治州"
        },
        {
            "id": "652801",
            "name": "库尔勒市",
            "parent_id": "652800",
            "level": "3",
            "full_name": "新疆维吾尔自治区-巴音郭楞蒙古自治州-库尔勒市"
        },
        {
            "id": "652822",
            "name": "轮台县",
            "parent_id": "652800",
            "level": "3",
            "full_name": "新疆维吾尔自治区-巴音郭楞蒙古自治州-轮台县"
        },
        {
            "id": "652823",
            "name": "尉犁县",
            "parent_id": "652800",
            "level": "3",
            "full_name": "新疆维吾尔自治区-巴音郭楞蒙古自治州-尉犁县"
        },
        {
            "id": "652824",
            "name": "若羌县",
            "parent_id": "652800",
            "level": "3",
            "full_name": "新疆维吾尔自治区-巴音郭楞蒙古自治州-若羌县"
        },
        {
            "id": "652825",
            "name": "且末县",
            "parent_id": "652800",
            "level": "3",
            "full_name": "新疆维吾尔自治区-巴音郭楞蒙古自治州-且末县"
        },
        {
            "id": "652826",
            "name": "焉耆回族自治县",
            "parent_id": "652800",
            "level": "3",
            "full_name": "新疆维吾尔自治区-巴音郭楞蒙古自治州-焉耆回族自治县"
        },
        {
            "id": "652827",
            "name": "和静县",
            "parent_id": "652800",
            "level": "3",
            "full_name": "新疆维吾尔自治区-巴音郭楞蒙古自治州-和静县"
        },
        {
            "id": "652828",
            "name": "和硕县",
            "parent_id": "652800",
            "level": "3",
            "full_name": "新疆维吾尔自治区-巴音郭楞蒙古自治州-和硕县"
        },
        {
            "id": "652829",
            "name": "博湖县",
            "parent_id": "652800",
            "level": "3",
            "full_name": "新疆维吾尔自治区-巴音郭楞蒙古自治州-博湖县"
        },
        {
            "id": "652900",
            "name": "阿克苏地区",
            "parent_id": "650000",
            "level": "2",
            "full_name": "新疆维吾尔自治区-阿克苏地区"
        },
        {
            "id": "652901",
            "name": "阿克苏市",
            "parent_id": "652900",
            "level": "3",
            "full_name": "新疆维吾尔自治区-阿克苏地区-阿克苏市"
        },
        {
            "id": "652922",
            "name": "温宿县",
            "parent_id": "652900",
            "level": "3",
            "full_name": "新疆维吾尔自治区-阿克苏地区-温宿县"
        },
        {
            "id": "652923",
            "name": "库车县",
            "parent_id": "652900",
            "level": "3",
            "full_name": "新疆维吾尔自治区-阿克苏地区-库车县"
        },
        {
            "id": "652924",
            "name": "沙雅县",
            "parent_id": "652900",
            "level": "3",
            "full_name": "新疆维吾尔自治区-阿克苏地区-沙雅县"
        },
        {
            "id": "652925",
            "name": "新和县",
            "parent_id": "652900",
            "level": "3",
            "full_name": "新疆维吾尔自治区-阿克苏地区-新和县"
        },
        {
            "id": "652926",
            "name": "拜城县",
            "parent_id": "652900",
            "level": "3",
            "full_name": "新疆维吾尔自治区-阿克苏地区-拜城县"
        },
        {
            "id": "652927",
            "name": "乌什县",
            "parent_id": "652900",
            "level": "3",
            "full_name": "新疆维吾尔自治区-阿克苏地区-乌什县"
        },
        {
            "id": "652928",
            "name": "阿瓦提县",
            "parent_id": "652900",
            "level": "3",
            "full_name": "新疆维吾尔自治区-阿克苏地区-阿瓦提县"
        },
        {
            "id": "652929",
            "name": "柯坪县",
            "parent_id": "652900",
            "level": "3",
            "full_name": "新疆维吾尔自治区-阿克苏地区-柯坪县"
        },
        {
            "id": "653000",
            "name": "克孜勒苏柯尔克孜自治州",
            "parent_id": "650000",
            "level": "2",
            "full_name": "新疆维吾尔自治区-克孜勒苏柯尔克孜自治州"
        },
        {
            "id": "653001",
            "name": "阿图什市",
            "parent_id": "653000",
            "level": "3",
            "full_name": "新疆维吾尔自治区-克孜勒苏柯尔克孜自治州-阿图什市"
        },
        {
            "id": "653022",
            "name": "阿克陶县",
            "parent_id": "653000",
            "level": "3",
            "full_name": "新疆维吾尔自治区-克孜勒苏柯尔克孜自治州-阿克陶县"
        },
        {
            "id": "653023",
            "name": "阿合奇县",
            "parent_id": "653000",
            "level": "3",
            "full_name": "新疆维吾尔自治区-克孜勒苏柯尔克孜自治州-阿合奇县"
        },
        {
            "id": "653024",
            "name": "乌恰县",
            "parent_id": "653000",
            "level": "3",
            "full_name": "新疆维吾尔自治区-克孜勒苏柯尔克孜自治州-乌恰县"
        },
        {
            "id": "653100",
            "name": "喀什地区",
            "parent_id": "650000",
            "level": "2",
            "full_name": "新疆维吾尔自治区-喀什地区"
        },
        {
            "id": "653101",
            "name": "喀什市",
            "parent_id": "653100",
            "level": "3",
            "full_name": "新疆维吾尔自治区-喀什地区-喀什市"
        },
        {
            "id": "653121",
            "name": "疏附县",
            "parent_id": "653100",
            "level": "3",
            "full_name": "新疆维吾尔自治区-喀什地区-疏附县"
        },
        {
            "id": "653122",
            "name": "疏勒县",
            "parent_id": "653100",
            "level": "3",
            "full_name": "新疆维吾尔自治区-喀什地区-疏勒县"
        },
        {
            "id": "653123",
            "name": "英吉沙县",
            "parent_id": "653100",
            "level": "3",
            "full_name": "新疆维吾尔自治区-喀什地区-英吉沙县"
        },
        {
            "id": "653124",
            "name": "泽普县",
            "parent_id": "653100",
            "level": "3",
            "full_name": "新疆维吾尔自治区-喀什地区-泽普县"
        },
        {
            "id": "653125",
            "name": "莎车县",
            "parent_id": "653100",
            "level": "3",
            "full_name": "新疆维吾尔自治区-喀什地区-莎车县"
        },
        {
            "id": "653126",
            "name": "叶城县",
            "parent_id": "653100",
            "level": "3",
            "full_name": "新疆维吾尔自治区-喀什地区-叶城县"
        },
        {
            "id": "653127",
            "name": "麦盖提县",
            "parent_id": "653100",
            "level": "3",
            "full_name": "新疆维吾尔自治区-喀什地区-麦盖提县"
        },
        {
            "id": "653128",
            "name": "岳普湖县",
            "parent_id": "653100",
            "level": "3",
            "full_name": "新疆维吾尔自治区-喀什地区-岳普湖县"
        },
        {
            "id": "653129",
            "name": "伽师县",
            "parent_id": "653100",
            "level": "3",
            "full_name": "新疆维吾尔自治区-喀什地区-伽师县"
        },
        {
            "id": "653130",
            "name": "巴楚县",
            "parent_id": "653100",
            "level": "3",
            "full_name": "新疆维吾尔自治区-喀什地区-巴楚县"
        },
        {
            "id": "653131",
            "name": "塔什库尔干塔吉克自治县",
            "parent_id": "653100",
            "level": "3",
            "full_name": "新疆维吾尔自治区-喀什地区-塔什库尔干塔吉克自治县"
        },
        {
            "id": "653200",
            "name": "和田地区",
            "parent_id": "650000",
            "level": "2",
            "full_name": "新疆维吾尔自治区-和田地区"
        },
        {
            "id": "653201",
            "name": "和田市",
            "parent_id": "653200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-和田地区-和田市"
        },
        {
            "id": "653221",
            "name": "和田县",
            "parent_id": "653200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-和田地区-和田县"
        },
        {
            "id": "653222",
            "name": "墨玉县",
            "parent_id": "653200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-和田地区-墨玉县"
        },
        {
            "id": "653223",
            "name": "皮山县",
            "parent_id": "653200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-和田地区-皮山县"
        },
        {
            "id": "653224",
            "name": "洛浦县",
            "parent_id": "653200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-和田地区-洛浦县"
        },
        {
            "id": "653225",
            "name": "策勒县",
            "parent_id": "653200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-和田地区-策勒县"
        },
        {
            "id": "653226",
            "name": "于田县",
            "parent_id": "653200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-和田地区-于田县"
        },
        {
            "id": "653227",
            "name": "民丰县",
            "parent_id": "653200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-和田地区-民丰县"
        },
        {
            "id": "654000",
            "name": "伊犁哈萨克自治州",
            "parent_id": "650000",
            "level": "2",
            "full_name": "新疆维吾尔自治区-伊犁哈萨克自治州"
        },
        {
            "id": "654002",
            "name": "伊宁市",
            "parent_id": "654000",
            "level": "3",
            "full_name": "新疆维吾尔自治区-伊犁哈萨克自治州-伊宁市"
        },
        {
            "id": "654003",
            "name": "奎屯市",
            "parent_id": "654000",
            "level": "3",
            "full_name": "新疆维吾尔自治区-伊犁哈萨克自治州-奎屯市"
        },
        {
            "id": "654004",
            "name": "霍尔果斯市",
            "parent_id": "654000",
            "level": "3",
            "full_name": "新疆维吾尔自治区-伊犁哈萨克自治州-霍尔果斯市"
        },
        {
            "id": "654021",
            "name": "伊宁县",
            "parent_id": "654000",
            "level": "3",
            "full_name": "新疆维吾尔自治区-伊犁哈萨克自治州-伊宁县"
        },
        {
            "id": "654022",
            "name": "察布查尔锡伯自治县",
            "parent_id": "654000",
            "level": "3",
            "full_name": "新疆维吾尔自治区-伊犁哈萨克自治州-察布查尔锡伯自治县"
        },
        {
            "id": "654023",
            "name": "霍城县",
            "parent_id": "654000",
            "level": "3",
            "full_name": "新疆维吾尔自治区-伊犁哈萨克自治州-霍城县"
        },
        {
            "id": "654024",
            "name": "巩留县",
            "parent_id": "654000",
            "level": "3",
            "full_name": "新疆维吾尔自治区-伊犁哈萨克自治州-巩留县"
        },
        {
            "id": "654025",
            "name": "新源县",
            "parent_id": "654000",
            "level": "3",
            "full_name": "新疆维吾尔自治区-伊犁哈萨克自治州-新源县"
        },
        {
            "id": "654026",
            "name": "昭苏县",
            "parent_id": "654000",
            "level": "3",
            "full_name": "新疆维吾尔自治区-伊犁哈萨克自治州-昭苏县"
        },
        {
            "id": "654027",
            "name": "特克斯县",
            "parent_id": "654000",
            "level": "3",
            "full_name": "新疆维吾尔自治区-伊犁哈萨克自治州-特克斯县"
        },
        {
            "id": "654028",
            "name": "尼勒克县",
            "parent_id": "654000",
            "level": "3",
            "full_name": "新疆维吾尔自治区-伊犁哈萨克自治州-尼勒克县"
        },
        {
            "id": "654200",
            "name": "塔城地区",
            "parent_id": "650000",
            "level": "2",
            "full_name": "新疆维吾尔自治区-塔城地区"
        },
        {
            "id": "654201",
            "name": "塔城市",
            "parent_id": "654200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-塔城地区-塔城市"
        },
        {
            "id": "654202",
            "name": "乌苏市",
            "parent_id": "654200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-塔城地区-乌苏市"
        },
        {
            "id": "654221",
            "name": "额敏县",
            "parent_id": "654200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-塔城地区-额敏县"
        },
        {
            "id": "654223",
            "name": "沙湾县",
            "parent_id": "654200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-塔城地区-沙湾县"
        },
        {
            "id": "654224",
            "name": "托里县",
            "parent_id": "654200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-塔城地区-托里县"
        },
        {
            "id": "654225",
            "name": "裕民县",
            "parent_id": "654200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-塔城地区-裕民县"
        },
        {
            "id": "654226",
            "name": "和布克赛尔蒙古自治县",
            "parent_id": "654200",
            "level": "3",
            "full_name": "新疆维吾尔自治区-塔城地区-和布克赛尔蒙古自治县"
        },
        {
            "id": "654300",
            "name": "阿勒泰地区",
            "parent_id": "650000",
            "level": "2",
            "full_name": "新疆维吾尔自治区-阿勒泰地区"
        },
        {
            "id": "654301",
            "name": "阿勒泰市",
            "parent_id": "654300",
            "level": "3",
            "full_name": "新疆维吾尔自治区-阿勒泰地区-阿勒泰市"
        },
        {
            "id": "654321",
            "name": "布尔津县",
            "parent_id": "654300",
            "level": "3",
            "full_name": "新疆维吾尔自治区-阿勒泰地区-布尔津县"
        },
        {
            "id": "654322",
            "name": "富蕴县",
            "parent_id": "654300",
            "level": "3",
            "full_name": "新疆维吾尔自治区-阿勒泰地区-富蕴县"
        },
        {
            "id": "654323",
            "name": "福海县",
            "parent_id": "654300",
            "level": "3",
            "full_name": "新疆维吾尔自治区-阿勒泰地区-福海县"
        },
        {
            "id": "654324",
            "name": "哈巴河县",
            "parent_id": "654300",
            "level": "3",
            "full_name": "新疆维吾尔自治区-阿勒泰地区-哈巴河县"
        },
        {
            "id": "654325",
            "name": "青河县",
            "parent_id": "654300",
            "level": "3",
            "full_name": "新疆维吾尔自治区-阿勒泰地区-青河县"
        },
        {
            "id": "654326",
            "name": "吉木乃县",
            "parent_id": "654300",
            "level": "3",
            "full_name": "新疆维吾尔自治区-阿勒泰地区-吉木乃县"
        },
        {
            "id": "659000",
            "name": "自治区直辖县级行政区划",
            "parent_id": "650000",
            "level": "2",
            "full_name": "新疆维吾尔自治区-自治区直辖县级行政区划"
        },
        {
            "id": "659001",
            "name": "石河子市",
            "parent_id": "659000",
            "level": "3",
            "full_name": "新疆维吾尔自治区-自治区直辖县级行政区划-石河子市"
        },
        {
            "id": "659002",
            "name": "阿拉尔市",
            "parent_id": "659000",
            "level": "3",
            "full_name": "新疆维吾尔自治区-自治区直辖县级行政区划-阿拉尔市"
        },
        {
            "id": "659003",
            "name": "图木舒克市",
            "parent_id": "659000",
            "level": "3",
            "full_name": "新疆维吾尔自治区-自治区直辖县级行政区划-图木舒克市"
        },
        {
            "id": "659004",
            "name": "五家渠市",
            "parent_id": "659000",
            "level": "3",
            "full_name": "新疆维吾尔自治区-自治区直辖县级行政区划-五家渠市"
        },
        {
            "id": "710000",
            "name": "台湾省",
            "parent_id": "0",
            "level": "1",
            "full_name": "台湾省"
        },
        {
            "id": "810000",
            "name": "香港特别行政区",
            "parent_id": "0",
            "level": "1",
            "full_name": "香港特别行政区"
        },
        {
            "id": "820000",
            "name": "澳门特别行政区",
            "parent_id": "0",
            "level": "1",
            "full_name": "澳门特别行政区"
        },
        {
            "id": "232701",
            "name": "加格达奇区",
            "parent_id": "232700",
            "level": "3",
            "full_name": "黑龙江省-大兴安岭地区-加格达奇区"
        },
        {
            "id": "232702",
            "name": "松岭区",
            "parent_id": "232700",
            "level": "3",
            "full_name": "黑龙江省-大兴安岭地区-松岭区"
        },
        {
            "id": "232703",
            "name": "新林区",
            "parent_id": "232700",
            "level": "3",
            "full_name": "黑龙江省-大兴安岭地区-新林区"
        },
        {
            "id": "232704",
            "name": "呼中区",
            "parent_id": "232700",
            "level": "3",
            "full_name": "黑龙江省-大兴安岭地区-呼中区"
        }
    ]';
        $data = json_decode($json,true);
        \App\Models\Region::insert($data);
    }
}
