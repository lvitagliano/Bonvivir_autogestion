class Landing {
  static seleccion(selection = 'Exclusiva') {
    if (selection === 'Exclusiva') {
      cy.get('[src="/images/selectionA.png"]').click();
      cy.get('.selection__h4').contains('Selección Exclusiva');
      cy.get('.selection__subtitle').contains(
        'Diferentes cepas y estilos de vinos cuidadosamente elegidos.'
      );

      cy.get(
        '.selection__card__select > :nth-child(1) > .selection__card > :nth-child(3)'
      ).contains('6 botellas');
      cy.get(
        '.selection__card__select > :nth-child(1) > .selection__card > :nth-child(3) > .selection__table > tbody > :nth-child(1) > :nth-child(4) > .selection__text-item'
      ).contains('$1,526'); // to be change
      cy.get(
        '.selection__card__select > :nth-child(1) > .selection__card > :nth-child(3)'
      ).contains('3 botellas');
    }

    if (selection === 'ExclusivaBlanca') {
      cy.get('[src="/images/selectionB.png"]').click();
      cy.get('.selection__h4').contains('Selección Exclusiva Blanca');
      cy.get('.selection__subtitle').contains(
        'Propuestas variada de vinos blancos y tintos.'
      );
      cy.get(
        '.selection__card__select > :nth-child(1) > .selection__card > :nth-child(3)'
      ).contains('6 botellas');
    }

    if (selection === 'AltaGama') {
      cy.get('[src="/images/selectionC.png"]').click();
      cy.get('.selection__h4').contains('Selección Alta Gama');
      cy.get('.selection__subtitle').contains(
        'Vinos excepcionales complejos y con gran potencial de guarda.'
      );

      cy.get(
        '.selection__card__select > :nth-child(1) > .selection__card > :nth-child(3)'
      ).contains('4 botellas');
      cy.get(
        '.selection__card__select > :nth-child(1) > .selection__card > :nth-child(3)'
      ).contains('2 botellas');
    }
  }

  seleccionExclusivaBotellas() {
    cy.get('.selection__h4').contains('Selección Exclusiva');
  }

  seleccionExclusivaPrecios() {
    cy.get('.selection__h4').contains('Selección Exclusiva');
  }

  seleccionExclusivaBlanca() {
    cy.get('.selection__h4').contains('Selección Exclusiva Blanca');
  }

  seleccionExclusivaAltaGama() {
    cy.get('.selection__h4').contains('Selección Alta Gama');
  }

  static checkCheckbox(identifer = '.checkbox') {
    cy.get(identifer);
  }

  static continuar(identifer = '.button__primary') {
    cy.get(identifer).click();
  }
}

export default Landing;
