<?php

class qlipsa extends CBitrixComponent
{
	public function executeComponent()
	{
		$this->addDays();
		$this->includeComponentTemplate();
	}

	protected function addDays()
	{
		if (CModule::IncludeModule("iblock")) {
			$request = \Bitrix\Main\Context::getCurrent()->getRequest();
			$data = $request->getPostList()->toArray();
			$numberOfDaysToAdd = (int)$data['workdays'];
			$currentDate = date('d.m.Y');
			$holidays = [];

			$res = CIBlockElement::GetPropertyValues($this->arParams['IBLOCK_ID'],[]);
			while ($arProperty = $res->GetNext()) {
				$holidays[] = $arProperty[1];
			}

			$i = 1;
			$j = 1;
			while ($i <= $numberOfDaysToAdd)
			{
				$currentTimeStamp = strtotime("+$j day");
				$currentDate = date('d.m.Y',$currentTimeStamp);
				$dayOfWeek = date('l', $currentTimeStamp); // Получаем название дня недели
				if ($dayOfWeek!=='Saturday' && $dayOfWeek!=='Sunday' && !in_array($currentDate, $holidays, true))
				{
					$i++;
				}
				$j++;
			}
			$this->arResult['RESULT'] = $currentDate;
		}

	}
}