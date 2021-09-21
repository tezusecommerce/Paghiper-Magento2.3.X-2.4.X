<?php

namespace Paghiper\Magento2\Block\Adminhtml\Sales\Order\Invoice;

use Magento\Framework\DataObject;
use Magento\Framework\View\Element\Template;
use Magento\Sales\Model\Order\Invoice;

class Totals extends Template
{

  /**
   * Order invoice
   *
   * @var Invoice|null
   */
  protected ?Invoice $_invoice = null;

  /**
   * @var DataObject
   */
  protected DataObject $_source;


  /**
   * Get data (totals) source model
   *
   * @return DataObject
   */
  public function getSource(): DataObject
  {
    return $this->getParentBlock()->getSource();
  }

  public function getInvoice()
  {
    return $this->getParentBlock()->getInvoice();
  }
  /**
   * Initialize payment fee totals
   *
   * @return $this
   */
  public function initTotals(): Totals
  {

    $this->getParentBlock();
    $this->getInvoice();
    $this->getSource();
    
    if(!$this->getSource()->getDataByKey('paghiper_fee_amount')) {
      return $this;
    }

    $total = new DataObject(
      [
        'code' => 'paghiper_fee',
        'value' => $this->getSource()->getDataByKey('paghiper_fee_amount'),
        'label' => __('Paghiper Tax')
      ]
    );

    $this->getParentBlock()->addTotal($total, 'paghiper_fee');
    return $this;
  }
}
