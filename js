<div class="speakers-block">
						<?$cities_keys = array_keys($arResult['SPEAKERS_BLOCK']['CITIES']);?>
						<div id="wrapper-city">
							<span>Город:</span>
							<select onchange="chooseCity(event)" id="speakers-city">
								<?foreach($arResult['SPEAKERS_BLOCK']['CITIES'] as $key=>$value):?>
									<option  <?if($key==$cities_keys[0]):?>selected <?endif;?> value="<?= $value['LEARNING_CENTER_ID'] ?>"><?= $value['LEARNING_CENTER_CITY'] ?></option>
								<?endforeach;?>
							</select>
						</div>
						<div onchange="chooceCity(event)" id="wrapper-date">
							<span>Дата: </span>
							<select  id="speakers-date">
								<? $dates_keys = array_keys($arResult['SPEAKERS_BLOCK']['CITIES'][$cities_keys[0]]['EVENTS_LIST']); ?>
								<?if(count($arResult['SPEAKERS_BLOCK']['CITIES'][$cities_keys[0]]['EVENTS_LIST']) > 1):?><option  value="all">Все даты</option><?endif?>
									<? foreach($arResult['SPEAKERS_BLOCK']['CITIES'][$cities_keys[0]]['EVENTS_LIST'] as $d => $date):?>
											<option <? if ($dates_keys[0] == $d): ?> selected <?endif?>  value="<?=$d;?>"><?=$date['RU_DATE'];?></option>
									<? endforeach;?>
							</select>
							
						</div>
						

						<div class="block-tabs" id="speakers_info">
							<div>
								<ul>
									<li></li>
								</ul>
							</div>
						</div>
					</div>
					<script>
						document.getElementById("speakers-city").addEventListener('change', function(e) {
							const valueOption = 'city_' + (e.target.value);
							const speakersBlock = document.getElementById("speakers_info");
							let speakersBlockChild = speakersBlock.children;
							for (let cityBlock of speakersBlockChild) {
								if (cityBlock.getAttribute("id") == valueOption) {
									cityBlock.classList.add('active');
								} else {
									cityBlock.classList.remove("active");
								}
							}
						})

						function chooceCity(event) {
							console.log(event.target.value);
						}

						

						function chooseCity(event) {

							const cityID = event.target.value;
							if (sco.hasOwnProperty(cityID)) {
								let city = sco[cityID]
								let select = document.createElement("select");
								let newOptions = ''
								let keys = []
								const optionAll = '<option selected value="all">Все даты</option>'
								for (const key in city) {
									if (key == 'EVENTS_LIST') {
										if (Object.keys(city[key]).length > 1) {
											newOptions += optionAll
											}
										for (i in city[key]) {
											if (newOptions.length == 0) {
												newOptions += `<option selected value=${i}>${city[key][i].RU_DATE}</option>`
											} else {
												newOptions += `<option value=${i}>${city[key][i].RU_DATE}</option>`
											}
											
										}
									}
								}
								
								select.innerHTML = newOptions
								select.id="speakers-date"
								
								parentSelect = document.getElementById('wrapper-date')
								parentSelect.children[1].remove()
								parentSelect.appendChild(select)


								
								
							}
						}


						function swipeSpeaker(e){
							const point = e.target;
							let pointCollection = point.parentNode.children;
							let c = 0;
							let speakerCollection = point.parentNode.previousSibling.children;
							for (let p=0; p < pointCollection.length; p++) {
								if(point === pointCollection[p]){
									c = p;
								}
							}
							let translateX = 'transform:translateX('+-(345*c)+'px)';
							for (let s=0; s < speakerCollection.length; s++) {
								speakerCollection[s].setAttribute("style",translateX);
							}
						}


					</script>
				</article>
				<?endif?>
				<?endif; //if($USER->IsAdmin())?>
				<?endif; //if(true)?>
