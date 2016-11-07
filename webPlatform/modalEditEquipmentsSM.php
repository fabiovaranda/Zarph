<!-- Modal -->
<div class='modal fade' id='myModal{{$index}}' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-dialog modal-lg' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
                <h4 class='modal-title' id='myModalLabel'>Edit Equipment</h4>
                <b>EID: </b> {{ equip.eid }} <b>SN: </b> {{ equip.serialNumber }} <b>Type: </b> {{ equip.etid }}
            </div>
            <div class='modal-body'>
            
                <div class='row'>
                    <div class='col-lg-3 col-md-3 col-sm-12' >
                        <p class='text-muted'>Time Zone</p>
                        <select name='timezone' id='timezone' class='form-control'>
                            <!-- função para devolver todas as timezones ?! ?!-->
                            <option id='1'>{{ equip.region }}</option>
                            <option id='2'>...</option>
                        </select>
                    </div>
                    <div class='col-lg-3 col-md-3 col-sm-12' >
                        <p class='text-muted'>Branch</p>
                        <select name='branch' id='branch' class='form-control'>
                            <!-- função para devolver todas as branches de um banco -->
                            <option id='1'>{{ equip.bankid }}</option>
                            <option id='2'>...</option>
                        </select>
                    </div>
                    <div class='col-lg-6 col-md-6 col-sm-12' >
                            <p class='text-muted'>Languages</p>
                            <ng-repeat ng-repeat='lang in languages'>                                
                                <label class='checkbox-inline' >
                                    <input type='checkbox' id='ck{{ lang.langID }}' value='{{ lang.langID }}' ng-checked='{{equip.languages.indexOf(lang.langID)}}>-1'> {{ lang.name }}
                                </label>    
                            </ng-repeat>
                    </div>
                </div>
                
                <div class='row'>                                                        
                    <div class='col-lg-8 col-md-10'>                                                            
                        <p class='text-muted'>Currencies</p>
                        <!-- função para ir buscar as currencies disponíveis -->

                        <!-- {{equip.currencies}} -->
                        <div class='containerTableModal'>
                            <div class='rowTableModal'>
                                <div class='leftColumnTableModal'>Name</div>
                                <div class='middleColumnTableModal'>Use</div>
                                <div class='middleColumnTableModal'>Mininum Amount</div>
                                <div class='rightColumnTableModal'>Maximum Amount</div>
                            </div>
                            <div class='rowTableModal form-inline'>
                                <div class='leftColumnTableModal'>EURO</div>
                                <div class='middleColumnTableModal'>
                                    <input type='checkbox' id='curr_euro' name='curr_euro' onclick='enableTextBox(this)'/>
                                </div>
                                <div class='middleColumnTableModal'>
                                    <input type='text' id='minAmount_euro' name='minAmount_euro' disabled class='form-control textToForm'/>
                                </div>
                                <div class='rightColumnTableModal'>
                                    <input type='text' id='maxAmount_euro' name='maxAmount_euro' disabled class='form-control textToForm'/>
                                </div>
                            </div>
                            <div class='rowTableModal form-inline'>
                                <div class='leftColumnTableModal '>LEV</div>
                                <div class='middleColumnTableModal'>
                                    <input type='checkbox' id='curr_lev' name='curr_lev' onclick='enableTextBox(this)'/>
                                </div>
                                <div class='middleColumnTableModal'>
                                    <input type='text' id='minAmount_lev' name='minAmount_lev' disabled class='form-control textToForm'/>
                                </div>
                                <div class='rightColumnTableModal'>
                                    <input type='text' id='maxAmount_lev' name='maxAmount_lev' disabled class='form-control textToForm'/>
                                </div>
                            </div>
                            <div class='rowTableModal form-inline'>
                                <div class='leftColumnTableModal'>KWANZA</div>
                                <div class='middleColumnTableModal'>
                                    <input type='checkbox' id='curr_kwanza' name='curr_kwanza' onclick='enableTextBox(this)'/>
                                </div>
                                <div class='middleColumnTableModal'>
                                    <input type='text' id='minAmount_kwanza' name='minAmount_kwanza' disabled class='form-control textToForm'/>
                                </div>
                                <div class='rightColumnTableModal'>
                                    <input type='text' id='maxAmount_kwanza' name='maxAmount_kwanza' disabled class='form-control textToForm'/>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>

                <div class='row rowToForm'>
                    <hr/>
                    <div class='col-lg-3 col-md-3'>
                        <p class='text-muted'>Max coins in safe</p>
                    </div>
                    <div class='col-lg-2 col-md-2'>
                        <input type='number' id='maxCoinsInSafe' name='maxCoinsInSafe' value='{{ equip.maxCoins }}' class='form-control textToForm' />
                    </div>
                    <div class='col-lg-3 col-md-3'>
                        <p class='text-muted'>Almost full amount</p>
                    </div>
                    <div class='col-lg-2 col-md-2'>
                        <input type='number' id='almostFullAmount' name='almostFullAmount' value='{{ equip.almostFullValue }}' class='form-control textToForm'/>
                    </div>
                </div>
                <div class='row rowToForm'>
                    <div class='col-lg-3 col-md-3'>
                        <p class='text-muted'>Max bills in safe</p>
                    </div>
                    <div class='col-lg-2 col-md-2'>
                        <input type='number' id='maxBillsInSafe' name='maxBillsInSafe' value='{{ equip.maxCoins }}' class='form-control textToForm'/>
                    </div>
                    <div class='col-lg-3 col-md-3'>
                        <p class='text-muted'>Full amount</p>
                    </div>
                    <div class='col-lg-2 col-md-2'>
                        <input type='number' id='fullAmount' name='fullAmount' value='{{ equip.fullValue }}' class='form-control textToForm'/>
                    </div>
                </div>
                <div class='row rowToForm'>
                    <div class='col-lg-3 col-md-3'>
                        <p class='text-muted'>Almost full percentage</p>
                    </div>
                    <div class='col-lg-2 col-md-2'>
                        <input type='number' id='almostFullPercentage' name='almostFullPercentage' value='{{ equip.almostFullPerc }}' class='form-control textToForm'/>
                    </div>
                    <div class='col-lg-3 col-md-3'>
                        <p class='text-muted'>Almost/Full amount currency</p>
                    </div>
                    <div class='col-lg-2 col-md-2'>
                        <select name='AlmostFullAmountCurrency' id='AlmostFullAmountCurrency' class='form-control textToForm'>
                            {{ equip.fullValueCid }}
                            <option value='1'>EURO</option>
                            <option value='2'>LEV</option>
                            <option value='3'>KWANZA</option>
                        </select>
                    </div>
                </div>
                <div class='row rowToForm'>
                    <div class='col-lg-3 col-md-3'>
                        <p class='text-muted'>Full percentage</p>
                    </div>
                    <div class='col-lg-2 col-md-2'>
                        <input type='number' id='fullPercentage' name='fullPercentage' value='{{ equip.fullPerc }}' class='form-control textToForm'/>
                    </div>
                </div>
                <div class='row rowToForm'>
                    <div class='col-lg-3 col-md-3'>
                        <p class='text-muted'>Card insertion timeout (secs)</p>
                    </div>
                    <div class='col-lg-2 col-md-2'>
                        <input type='number' id='cardInsertionTimeout' name='cardInsertionTimeout' value='{{ equip.cardInsertionTimeout }}' class='form-control textToForm'/> 
                    </div>
                </div>
                <div class='row rowToForm'>
                    <div class='col-lg-3 col-md-3'>
                        <p class='text-muted'>Card removal timeout (secs)</p>
                    </div>
                    <div class='col-lg-2 col-md-2'>
                        <input type='number' id='cardRemovalTimeout' name='cardRemovalTimeout' value='{{ equip.cardRemovalTimeout }}' class='form-control textToForm'/> 
                    </div>
                </div>
                <div class='row rowToForm'>
                    <div class='col-lg-3 col-md-3'>
                        <p class='text-muted'>Data insertion timeout (secs)</p>
                    </div>
                    <div class='col-lg-2 col-md-2'>
                        <input type='number' id='dataInsertionTimeout' name='dataInsertionTimeout' value='{{ equip.dataInsertionTimeout }}' class='form-control textToForm'/> 
                    </div>
                </div>
                <div class='row rowToForm'>
                    <div class='col-lg-3 col-md-3'>
                        <p class='text-muted'>Deposit timeout (secs)</p>
                    </div>
                    <div class='col-lg-2 col-md-2'>
                        <input type='number' id='depositTimeout' name='depositTimeout' value='{{ equip.depositTimeout }}' class='form-control textToForm'/> 
                    </div>
                </div>
                <div class='row rowToForm'>
                    <div class='col-lg-3 col-md-3'>
                        <p class='text-muted'>Choose declaration (secs)</p>
                    </div>
                    <div class='col-lg-2 col-md-2'>
                        <input type='number' id='chooseDeclaration' name='chooseDeclaration' value='{{ equip.declarationTimeout }}' class='form-control textToForm'/> 
                    </div>
                </div>
                <div class='row rowToForm'>
                    <div class='col-lg-3 col-md-3'>
                        <p class='text-muted'>Endpoint address</p>
                    </div>
                    <div class='col-lg-6 col-md-8'>
                        <input type='text' id='endpointAddress' name='endpointAddress' value='{{ equip.endpointAddress }}' class='form-control textToForm'/>
                    </div>
                </div>

            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                <button type='button' class='btn btn-primary'>Save changes</button>
            </div>
        </div>
    </div>
</div>