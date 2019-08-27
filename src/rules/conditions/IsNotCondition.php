<?php

namespace barrelstrength\sproutforms\rules\conditions;

use barrelstrength\sproutforms\base\BaseCondition;
use barrelstrength\sproutforms\fields\formfields\BaseOptionsFormField;

class IsNotCondition extends BaseCondition
{
    public function getLabel(): string
    {
        return 'is not';
    }

	/**
	 * @inheritDoc
	 */
	public function getValue(): string
	{
		return self::class;
	}

	public function getValueInputHtml($name , $value): string
	{
		$html = '<input class="text fullwidth" type="text" name="'.$name.'" value="'.$value.'">';

		if ($this->formField instanceof BaseOptionsFormField){
		$html = '<div class="select"><select name="' . $name . '">';
		$firstRow = 'selected';
		foreach ( $this->formField->options as $option ) {
			$rowValue = $option['value'];
			$label = $option['label'];
			$isSelected = $rowValue == $value ? 'selected' : '';
			$html .= '<option ' . $firstRow . ' value="' . $rowValue . '" ' . $isSelected. '>' . $label . '</option>';
			$firstRow = '';
		}
		$html .= '</select></div>';
	}

		return $html;
	}
}