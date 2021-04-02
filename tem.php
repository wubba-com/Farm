<article>
								<div>
									<?$cities_keys = array_keys($arResult['SPEAKERS_BLOCK']['CITIES']);?>
									<span>Город:</span><select size="1" id="speakers_sity">
										<?foreach($arResult['SPEAKERS_BLOCK']['CITIES'] as $key=>$value):?>
										    <option <?if($key == $cities_keys[0]):?>selected <?endif;?> value="<?=$value['LEARNING_CENTER_ID']?>"><?=$value['LEARNING_CENTER_CITY']?></option>
										<?endforeach;?>
   									</select>
   									<div id="speakers_info" style="height: 300px;overflow: hidden;">
										<?foreach($arResult['SPEAKERS_BLOCK']['CITIES'] as $key=>$value):?>
											<div id="city_<?=$value['LEARNING_CENTER_ID']?>" <?if($key == $cities_keys[0]):?>class="active" <?endif;?> style="margin:0;width: 100%;box-sizing: border-box;border: 1px solid; height: 300px;">город = <?=$value['LEARNING_CENTER_CITY']?>
												
											</div>
										<?endforeach;?>
   									</div>
								</div>
								<script>
									document.getElementById("speakers_sity").addEventListener('change', function (e) {
										const divId = 'city_'+(e.target.value);
										const div_speakers_info = document.getElementById("speakers_info");
										let speakers_info_children = div_speakers_info.children;
										//querySelector()
										console.log(speakers_info_children);
										for(let city_block in speakers_info_children){
											let speakers_city = speakers_info_children[city_block];
											if(speakers_city.getAttribute('id') === divId){
												speakers_city.classList.remove('active');
											}else{
												speakers_city.setAttribute("class","");
											}
										}
									})

									
								</script>
								<?echo "<pre>";print_r($arResult['SPEAKERS_BLOCK']['CITIES']);echo "</pre>";?>
							</article>
						<?endif?>
					<?endif; //if($USER->IsAdmin())?>
				<?endif; //if(true)?>

				<div class="clear"></div>
				<? if (trim($arResult['SPECIAL_INFO']) != '') { ?>
				<img src="/img/education/page1/educationPagePic4.png" alt="" />

				<article>
					<p class="h4" id="otherInformation">Дополнительная<br /> информация</p>
					<?
								$saminfo = htmlspecialchars_decode($arResult['SPECIAL_INFO']); 
								$saminfo = str_replace("<b>", "<span class='b_user'>", $saminfo);
								$saminfo = str_replace("<B>", "<span class='b_user'>", $saminfo);
								$saminfo = str_replace("</b>", "</span>", $saminfo);
								$saminfo = str_replace("</B>", "</span>", $saminfo);
								$saminfo = str_replace("<b></b>", "", $saminfo);
								$saminfo = str_replace("<strong>", "<span class='b_user'>", $saminfo);
								$saminfo = str_replace("<STRONG>", "<span class='b_user'>", $saminfo);
								$saminfo = str_replace("</strong>", "</span>", $saminfo);
								$saminfo = str_replace("</STRONG>", "</span>", $saminfo);
								$saminfo = str_replace("<b></b>", "", $saminfo);
								echo htmlspecialchars_decode($saminfo);					
							?>

				</article>
				<? } ?>

				<?
					if ($arResult['PREPAYMENT'] == true) {
						?>
				<div class="clear"></div>
				<img src="/img/education/page1/educationPagePic3.png" alt="" />

				<article id="el">
					<p class="h4">Оплата</p>
					Предварительно оплачивать семинар необходимо только после того, как менеджер подтвердил
					запись
					на семинар.
				</article>
				<? } ?>
			</article>
