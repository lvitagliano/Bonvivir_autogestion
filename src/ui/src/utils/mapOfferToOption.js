import { MESSAGES } from '../config/messages';

const constOptions = [
  {
    title: 'Selección Exclusiva',
    description: '3 botellas',
    selection: 0
  },
  {
    title: 'Selección Exclusiva',
    description: '6 botellas',
    selection: 1
  },
  {
    title: 'Selección Exclusiva Blanca',
    description: '6 botellas',
    selection: 2
  },
  {
    title: 'Selección Alta Gama',
    description: '2 botellas',
    selection: 3
  },
  {
    title: 'Selección Alta Gama',
    description: '4 botellas',
    selection: 4
  },
  {
    title: 'Selección Puro Malbec',
    description: '4 botellas',
    selection: 5
  },
  {
    title: 'Selección Singular',
    description: '4 botellas',
    selection: 6
  }
];

export const mapOfferToOption = (options, organic) => {
  if (organic) {
    options.forEach((option, i) => {
      option.selectionDetails.forEach((selectionDetail, j) => {
        const constOption = constOptions.find(
          co =>
            co.description.replace(' ', '') ===
              options[i].selectionDetails[j].item.replace(' ', '') &&
            co.title.replace(' ', '') === options[i].title.replace(' ', '')
        );

        if (constOption) {
          const item = organic.items.find(
            it => it.selection === constOption.selection
          );

          if (item) {
            options[i].selectionDetails[j].commonPrice = item.basePrice;
            options[i].selectionDetails[j].clubLaNacionPrice =
              item.clubLaNacionPrice;
            options[i].selectionDetails[j].promotionId = item.basePriceId;
            options[i].selectionDetails[j].schemaId = item.schemaId;
            options[i].selectionDetails[j].disabled = false;
          } else {
            options[i].selectionDetails[j].commonPrice = MESSAGES.NO_PRICE;
            options[i].selectionDetails[j].clubLaNacionPrice =
              MESSAGES.NO_PRICE;
            options[i].selectionDetails[j].schemaId = '';
            options[i].selectionDetails[j].disabled = true;
          }
        } else {
          options[i].selectionDetails[j].commonPrice = MESSAGES.NO_PRICE;
          options[i].selectionDetails[j].clubLaNacionPrice = MESSAGES.NO_PRICE;
          options[i].selectionDetails[j].schemaId = '';
          options[i].selectionDetails[j].disabled = true;
        }
      });
    });

    return options;
  }

  return options;
};
