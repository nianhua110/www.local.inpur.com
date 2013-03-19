        <div class="introduce">
        	<div class="introduce_text">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;上海浪潮工贸有限公司是专业提供计算机和网络信息类服务的IT资源服务商，长期向金融、政府部门、企业和其他各类客户提供完整的解决方案以满足客户不断增长和变化的信息需求。<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;公司创建于1999年,经过多年发展，公司在国内网络和计算机系统集成市场已成功地承接和参与了多个大型项目。经过长期的治业和奋斗，我们开拓了各类IT产品销售、服务、计算机机房和网络布线工程等各项业务。经过多年的技术沉淀，我们培养了一批高职业素质、高技术水平、强协作能力的设计人员、技术项目经理和施工实施人员，在IT产品销售服务、电子机房和综合布线、网络系统设计、网络安全和网络应用系统的开发等方面积累了丰富的经验。 
            </div>
        </div>
        <div class="content">
        	<div class="pin left">
            	<h1>联系我们</h1>
            	<div class="list">
                	<ul>
                    	<li>地址：<?php echo $site['address'];?></li>
                        <li>邮编：<?php echo $site['zipcode'];?></li>
                        <li>电话：<?php echo $site['tel'];?></li>
                        <li>传真：<?php echo $site['fax'];?></li>
                        <li>邮箱：<?php echo $site['email'];?></li>
                    </ul>
                </div>         
            </div>
            <div class="pin left">
            	<h1>案例中心<a href="/index.php?c=cate&cid=5" title="更多">+</a></h1>
            	<div class="list">
                	<ul>
                    	<?php foreach($case as $list):?>
                    	<li><a href="index.php?c=detail&id=<?php echo $list['id']?>" target='_blank'"><?php echo $list['title']?></a><span><?php echo date("y-m-d",$list['datetime']);?></span></li>
                    	<?php endforeach;?>
                    </ul>
                </div>           
            </div>
            <div class="pin left">
            	 <h1>企业邮箱</h1>
                 <div class="mail">
                 	<form method="post" action="https://entry.qiye.163.com/domain/domainEntLogin" name="loginform" target="_blank">
                 	<ul>
                        <input type="hidden" name="domain" value="net-service.cn" />
                    	<li>用户名：<input type="text" name="account_name" value="" class="ipt_text" /></li>
                        <li>密&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password"  name="password" value="" class="ipt_text" /></li>
                        <li>
                        	<input name="remUser" value="1" type="hidden"  />
                        	<input name="secure" value="1" type="hidden" />
                        	<input name="all_secure" value="1" type="hidden" />
                            <input type="submit" value="登&nbsp;&nbsp;&nbsp;&nbsp;录" class="ipt_submit" />
                            <a href="http://mail.net-service.cn" target="_blank" >163登录>></a>
                        </li>
                    </ul>
                    </form>
                 </div>          
            </div>         
        </div>