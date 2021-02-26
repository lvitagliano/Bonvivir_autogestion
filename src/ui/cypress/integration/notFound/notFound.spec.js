// eslint-disable-next-line spaced-comment
/// <reference types="Cypress" />

context('NotFound', () => {
  describe('Load page', () => {
    it('Load page by route', () => {
      cy.visit('/notfound');
    });
  });

  describe('Navigate button', () => {
    it('Go to Home page by button', () => {
      cy.get(`.button__primary`).click();
    });
  });
});
