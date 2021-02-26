import React, { Fragment, useState } from "react";
import { FormControl, InputLabel, Select, MenuItem  } from "@material-ui/core";
import moment from 'moment';

const SelectOptions = (props) => {
  const optionsOk = props.options.map((item, key) => {
    return {value: key, label: moment(item).format('MMMM-YYYY').toLocaleUpperCase()}
  });
  const [selectValues, setSelectValue] = useState({ selectedOption: optionsOk[0].value });

  const handleMultiChange = (data) => {
    const result = props.options[data.target.value]
    setSelectValue({ selectedOption: data.target.value});
    props.handleProps(data.target.value, result)
  };


  return (
     <Fragment>
      
          <InputLabel htmlFor="password">
            {props.label.toUpperCase()}
          </InputLabel>
          <FormControl variant="outlined">
          <Select
              placeholder={<div>{props.srcLb}</div>}
              noOptionsMessage={() => <div>{props.notFn}</div>}
              value={selectValues.selectedOption}
              onChange={handleMultiChange}
              name={props.name}
              setValue={setSelectValue}
              defaultValue={selectValues.selectedOption}
            >
              {
                optionsOk.map((item) => {
                return <MenuItem value={item.value}>{item.label}</MenuItem>
                })
              }

            </Select>
          </FormControl>
    </Fragment>
  );
};
export default SelectOptions;
