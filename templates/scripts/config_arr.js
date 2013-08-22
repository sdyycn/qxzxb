//婚姻状况
var marry_a=[];
marry_a['1']='未婚';
marry_a['2']='已婚';
marry_a['3']='离异';
marry_a['4']='保密';
//政治面貌
var political_a=[];
political_a["1"]='中共党员';
political_a["2"]='团员';
political_a["3"]='群众';
political_a["4"]='民主党派';
political_a["5"]='无党派人士';
//工作性质
var employtype_a=[];
employtype_a["1"]='全职';
employtype_a["2"]='兼职';
employtype_a["3"]='实习';
//当前状态
var workstate_a=[];
workstate_a["1"]='我目前处于离职状态，可立即上岗';
workstate_a["2"]='我目前在职，正考虑换个新环境(如有合适的工作机会，到岗时间一个月左右)';
workstate_a["3"]='目前暂无跳槽打算';
workstate_a["4"]='我对现有工作还算满意，如有更好的工作机会，我也可以考虑。(到岗时间另议)';
workstate_a["5"]='应届毕业生';
//期望月薪
var salary_a=[];
salary_a["1"]='1000元/月以下';
salary_a["2"]='1000-2000元/月';
salary_a["3"]='2001-4000元/月';
salary_a["4"]='4001-6000元/月';
salary_a["5"]='6001-8000元/月';
salary_a["6"]='8001-10000元/月';
salary_a["7"]='10001-15000元/月';
salary_a["8"]='15000-25000元/月';
salary_a["9"]='25000元/月以上';
salary_a["10"]='面议';
//企业性质
var companytype_a=[];
companytype_a["1"]="国企";
companytype_a["2"]="外商独资";
companytype_a["3"]="代表处";
companytype_a["4"]="合资";
companytype_a["5"]="民营";
companytype_a["6"]="股份制企业";
companytype_a["7"]="上市公司";
companytype_a["8"]="国家机关";
companytype_a["9"]="事业单位";
companytype_a["10"]="其他";
//企业规模
var companysize_a=[];
companysize_a["1"]="20人以下";
companysize_a["2"]="20-99人";
companysize_a["3"]="100-499人";
companysize_a["4"]="500-999人";
companysize_a["5"]="1000-9999人";
companysize_a["6"]="10000人以上";
//学历学位
var degree_a=[];
degree_a["1"]="不限";
degree_a["2"]="初中";
degree_a["3"]="中技";
degree_a["4"]="高中";
degree_a["5"]="中专";
degree_a["6"]="大专";
degree_a["7"]="本科";
degree_a["8"]="硕士";
degree_a["9"]="MBA";
degree_a["10"]="EMBA";
degree_a["11"]="博士";
degree_a["12"]="其他";
//语言
var language_a=[];
language_a["1"]="无";
language_a["2"]="英语";
language_a["3"]="日语";
language_a["4"]="法语";
language_a["5"]="德语";
language_a["6"]="俄语";
language_a["7"]="韩语";
language_a["8"]="西班牙语";
language_a["9"]="葡萄牙语";
language_a["10"]="阿拉伯语";
language_a["11"]="意大利语";
language_a["12"]="其他";
//语言技能
var  skill_a=[];
skill_a["1"]="一般";
skill_a["2"]="良好";
skill_a["3"]="熟练";
skill_a["4"]="精通";
//工作经验
var workexp_a=[];
workexp_a["1"]="不限";
workexp_a["2"]="1年以下 ";
workexp_a["3"]="1-3年";
workexp_a["4"]="3-5年";
workexp_a["5"]="5-8年";
workexp_a["6"]="8-10年";
workexp_a["7"]="10年以上";

//获取选项列表函数
function getSelectitems(selectid, array_name) {
	outstr = "";
	for (var i in array_name) {
		outstr += "<option value='" + array_name[i] + "'>" + array_name[i] + "</option>";
	}
	$(selectid).html(outstr);
}